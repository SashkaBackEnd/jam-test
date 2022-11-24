<?php

namespace api\modules\rest\forms;

use common\services\MailSenderService;
use Yii;
use yii\base\Model;
use yii\helpers\{ArrayHelper, FileHelper, Json};
use yii\web\UploadedFile;
use api\models\{Document, RequestGuest};

class RequestSendForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $comment;

    private $id;
    private $fileLinks;

    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'comment'], 'required'],
            [['name', 'phone'], 'string', 'max' => 50],
            [['comment'], 'string', 'max' => 1000],
            ['email', 'email'],
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
     * Сохранение запроса от гостя в БД
     *
     * @return bool
     */
    public function saveRequestGuest(): bool
    {
        $requestGuest = new RequestGuest([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'comment' => $this->comment,
        ]);

        if ($requestGuest->save()) {
            $this->id = $requestGuest->id;

            return true;
        }

        return false;
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

                    $modelName = RequestGuest::tableName();
                    $activeRecordId = $this->id;
                    $nameModelAndId = "{$modelName}/{$activeRecordId}/";
                    $path = Document::getPathFile($nameModelAndId);
                    FileHelper::createDirectory($path);
                    $hash = (string)Yii::$app->security->generateRandomString();
                    $filename = $hash . '.' . $file->extension;

                    if ($file->saveAs($path . $filename)) {
                        $document = new Document();
                        $document->kind = Document::KIND_SEND_REQUEST;
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
        Name: {$this->name}<br/>
        Phone: {$this->phone}<br/>
        Email: {$this->email}<br/>
        Comment: {$this->comment}<br/>
        ";

        if (!empty($this->fileLinks)) {
            $body .= "Files:<br/>";

            foreach ($this->fileLinks as $fileLink) {
                $body .= $fileLink . "<br/>";
            }
        }

        $subject = 'Request Jam.Market MainPage';
        $emails = [ArrayHelper::getValue(Yii::$app->params, 'notificationEmail')];
        $mailSender = new MailSenderService();

        return $mailSender->send($subject, $body, $emails);
    }
}
