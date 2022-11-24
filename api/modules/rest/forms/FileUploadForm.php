<?php

namespace api\modules\rest\forms;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use api\models\Document;

class FileUploadForm extends Model
{
    private array $filesHash;

    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules()
    {
        return [
            [['files'], 'required'],
            [['files'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10],
        ];
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
                foreach ($this->files as $file) {
                    /** @var UploadedFile $file */
                    $path = Document::getPathFile('temp/');
                    FileHelper::createDirectory($path);
                    $hash = (string)Yii::$app->security->generateRandomString();
                    $filename = $hash . '.' . $file->extension;

                    if ($file->saveAs($path . $filename)) {
                        $document = new Document();
                        $document->kind = Document::KIND_UNDEFINED;
                        $document->name = $file->name;
                        $document->hash = $hash;
                        $document->size = $file->size;
                        $document->type = $file->extension;
                        $document->model_name = 'temp';
                        $document->active_record_id = null;

                        if ($document->save()) {
                            $this->filesHash['files'][] = $document->hash;
                        } else {
                            Yii::error([
                                'msg' => 'Не удалось сохранить запись о документе в БД',
                                'file' => $file,
                                'errors' => $document->errors,
                            ], __CLASS__);

                            @unlink($path . $filename);
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

    public function getFilesHash(): array
    {
        return $this->filesHash;
    }
}
