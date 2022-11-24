<?php

namespace api\modules\graphql\forms;

use api\exceptions\RuntimeException;
use api\models\{Document, Request, RequestMessage, User};
use common\services\MailSenderService;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Создание заявки из ЛК
 */
class RequestCreateForm extends Model
{
    public $comment;
    public $files;
    public User $user;

    private Request $request;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            ['comment', 'string'],
            ['files', 'safe'],
        ];
    }

    public function save()
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $request = new Request();
            $request->created_by = $this->user->id;
            $request->status = Request::STATUS_NEW;

            if (!$request->save()) {
                $transaction->rollback();
            }

            $requestMessage = new RequestMessage();
            $requestMessage->is_read = false;
            $requestMessage->message = $this->comment;
            $requestMessage->created_by_role = 'company';
            $requestMessage->request_id = $request->id;
            $requestMessage->created_by = $this->user->id;
            $requestMessage->link('request', $request);

            if (!empty($this->files)) {
                foreach ($this->files as $hash) {
                    Document::moveFileAndUpdateDocument(
                        hash: $hash,
                        activeRecordId: $requestMessage->id,
                        modelName: RequestMessage::tableName(),
                        kind: Document::KIND_REQUEST_MESSAGE
                    );
                }
            }

            $transaction->commit();

            $this->request = $request;

            return true;
        } catch (\Throwable $th) {
            $transaction->rollback();

            throw new RuntimeException(Yii::t('api', $th->getMessage()));
        }
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function sendMail(string $subject): bool
    {
        $files = [];

        if (!empty($this->files)) {
            foreach ($this->files as $hash) {
                $document = Document::findOne(['hash' => $hash]);
                $files[] = $this->generateURrlDownloadFile($document->hash);
            }
        }

        $body = "
        User: {$this->user->email}<br/>
        Comment: {$this->comment}<br/>
        ";

        if (!empty($files)) {
            $body .= "Files:<br/>";

            foreach ($files as $fileLink) {
                $body .= $fileLink . "<br/>";
            }
        }

        $emails = [ArrayHelper::getValue(Yii::$app->params, 'notificationEmail')];

        return (new MailSenderService())->send($subject, $body, $emails);
    }

    /**
     * Сформировать ссылку на скачивание файла
     *
     * @param string $hash
     *
     * @return string
     */
    private function generateURrlDownloadFile(string $hash): string
    {
        $domain = ArrayHelper::getValue(Yii::$app->params, 'domain.cp');

        return $domain . '/file/download?hash=' . $hash;
    }
}
