<?php

namespace api\modules\graphql\forms;

use common\services\MailSenderService;
use Yii;
use api\exceptions\RuntimeException;
use yii\base\Model;
use api\models\{Document, Request, RequestGuest, RequestMessage, User};
use yii\helpers\ArrayHelper;

/**
 * Создание заявки с лендинга посетителем сайта
 */
class RequestGuestCreateForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $comment;
    public $files;

    private RequestGuest $requestGuest;

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'comment'], 'required'],
            [['name', 'phone', 'email', 'comment'], 'string'],
            ['files', 'safe'],
        ];
    }

    public function save()
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $requestGuest = new RequestGuest();
            $requestGuest->name = $this->name;
            $requestGuest->phone = $this->phone;
            $requestGuest->email = $this->email;
            $requestGuest->comment = $this->comment;

            if (!$requestGuest->save()) {
                $transaction->rollback();
            }

            if (!empty($this->files)) {
                foreach ($this->files as $hash) {
                    Document::moveFileAndUpdateDocument(
                        hash: $hash,
                        activeRecordId: $requestGuest->id,
                        modelName: RequestGuest::tableName(),
                        kind: Document::KIND_SEND_REQUEST
                    );
                }
            }

            $transaction->commit();

            $this->requestGuest = $requestGuest;

            return true;
        } catch (\Throwable $th) {
            $transaction->rollback();

            throw (new RuntimeException(Yii::t('api', $th->getMessage())));
        }
    }

    public function getRequestGuest(): RequestGuest
    {
        return $this->requestGuest;
    }

    public function sendMail(): bool
    {
        $files = [];

        if (!empty($this->files)) {
            foreach ($this->files as $hash) {
                $document = Document::findOne(['hash' => $hash]);
                $files[] = $this->generateURrlDownloadFile($document->hash);
            }
        }

        $body = "
        Name: {$this->name}<br/>
        Phone: {$this->phone}<br/>
        Email: {$this->email}<br/>
        Comment: {$this->comment}<br/>
        ";

        if (!empty($files)) {
            $body .= "Files:<br/>";

            foreach ($files as $fileLink) {
                $body .= $fileLink . "<br/>";
            }
        }

        $subject = 'Request Jam.Market MainPage';
        $emails = [ArrayHelper::getValue(Yii::$app->params, 'notificationEmail')];

        $mailSender = new MailSenderService();

        return $mailSender->send($subject, $body, $emails);
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
