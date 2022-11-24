<?php

namespace api\modules\rest\forms;

use common\services\MailSenderService;
use Yii;
use yii\base\Model;
use yii\helpers\{ArrayHelper, FileHelper, Json};
use yii\web\UploadedFile;
use api\models\{Document, Request, RequestGuest, RequestMessage, User};

class RequestNewForm extends Model
{
    public string $comment;

    private $id;
    private $fileLinks;

    public User $user;

    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'max' => 1000],
            [['files'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10],
        ];
    }

    /**
     * Сформировать ссылку на скачивание файла
     *
     * @param string $filename
     * @param string $hash
     * @return string
     */
    private function generateURrlDownloadFile(string $filename, string $hash): string
    {
        $domain = ArrayHelper::getValue(Yii::$app->params, 'domain.cp');

        return $domain . '/file/download?hash=' . $hash;
    }

    /**
     * Сохранение заявки в БД
     *
     * @return bool
     */
    public function saveRequest(): bool
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

            $transaction->commit();

            $this->id = $requestMessage->id;

            return true;
        } catch (\Throwable $th) {
            $transaction->rollback();

            return false;
        }
    }

    /**
     * Загрузка файлов на сервер
     *
     * @return bool
     * @throws \yii\base\Exception
     */
    public function upload(): bool
    {
        $this->files = UploadedFile::getInstancesByName('files');

        if ($this->validate()) {
            if (!empty($this->files)) {
                $documentIds = [];

                foreach ($this->files as $file) {
                    /** @var UploadedFile $file */

                    $modelName = RequestMessage::tableName();
                    $activeRecordId = $this->id;
                    $nameModelAndId = "{$modelName}/{$activeRecordId}/";
                    $path = Document::getPathFile($nameModelAndId);
                    FileHelper::createDirectory($path);
                    $hash = (string)Yii::$app->security->generateRandomString();
                    $filename = $hash . '.' . $file->extension;

                    if ($file->saveAs($path . $filename)) {
                        $document = new Document();
                        $document->kind = Document::KIND_REQUEST_MESSAGE;
                        $document->name = $file->name;
                        $document->hash = $hash;
                        $document->size = $file->size;
                        $document->type = $file->extension;
                        $document->model_name = $modelName;
                        $document->active_record_id = $activeRecordId;

                        if ($document->save()) {
                            $documentIds[] = $document->id;
                            $this->fileLinks[] = $this->generateURrlDownloadFile($file->name, $hash);
                        } else {
                            Yii::warning([
                                'msg' => 'Не удалось сохранить запись о документе в БД',
                                'file' => $file,
                                'errors' => $document->errors,
                            ], __CLASS__);
                        }
                    } else {
                        Yii::warning([
                            'msg' => 'Не удалось загрузить документ на сервер',
                            'file' => $file,
                        ], __CLASS__);
                    }
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Отправка письма
     *
     * @return bool
     * @throws \Throwable
     */
    public function sendMail(): bool
    {
        $body = "
        User: {$this->user->email}<br/>
        Comment: {$this->comment}<br/>
        ";

        if (!empty($this->fileLinks)) {
            $body .= "Files:<br/>";

            foreach ($this->fileLinks as $fileLink) {
                $body .= $fileLink . "<br/>";
            }
        }

        $subject = 'Request from Pharm.market';
        $emails = [ArrayHelper::getValue(Yii::$app->params, 'notificationEmail')];
        $mailSender = new MailSenderService();

        return $mailSender->send($subject, $body, $emails);
    }
}
