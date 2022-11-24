<?php

namespace api\models;

use Yii;
use yii\helpers\FileHelper;
use api\exceptions\RuntimeException;
use common\models\base\Document as CommonDocument;

class Document extends CommonDocument
{
    /**
     * Переместить файл из временной папки в постоянную и изменить об этом запись в БД
     *
     * @param string $hash
     * @param integer $activeRecordId
     * @param string $modelName
     * @param string $kind
     * @return void
     */
    public static function moveFileAndUpdateDocument(
        string $hash,
        int $activeRecordId,
        string $modelName,
        string $kind
    ): void {
        $document = static::findDocument($hash);
        $pathTempWithFilename = static::findTempFile($document, $hash);
        static::moveFileFromTempToTargetDirectory($document, $hash, $activeRecordId, $modelName, $pathTempWithFilename);
        static::updateDocument($document, $hash, $kind, $modelName, $activeRecordId);
    }

    /**
     * Проверить обновляемые файлы. Если среди них удалился файл, то пометить его как удаленный
     *
     * @param array $modifiedFiles
     * @param string $hash
     * @param integer $activeRecordId
     * @param string $modelName
     * @param string $kind
     * @param bool $isDeleteAll
     * @return bool
     */
    public static function checkModifyFileAndUpdateDocument(
        array $modifiedFiles,
        int $activeRecordId,
        string $modelName,
        string $kind,
        bool $isDeleteAll = false
    ): bool {
        $documents = Document::findAll([
            'kind' => $kind,
            'model_name' => $modelName,
            'active_record_id' => $activeRecordId,
        ]);

        $isModified = false;

        if ($documents) {
            foreach ($documents as $document) {
                // Пометить документ как удаленный, если его нет в $modifiedFiles
                if (!in_array($document->hash, $modifiedFiles) || $isDeleteAll) {
                    $document->is_deleted = true;

                    if (!$document->save()) {
                        Yii::warning([
                            'msg' => 'Не удалось изменить компанию при удалении документов',
                            'document' => $document,
                        ], __CLASS__);
                    }

                    $isModified = true;
                }
            }
        }

        return $isModified;
    }

    private static function findDocument(string $hash): Document
    {
        $document = Document::findOne(['hash' => $hash]);

        if (!$document) {
            throw new RuntimeException(Yii::t('api', 'Документ не существует ({hash})', ['hash' => $hash]));
        }

        return $document;
    }

    private static function filename(Document $document): string
    {
        return $document->hash . '.' . $document->type;
    }

    private static function findTempFile(Document $document, string $hash): string
    {
        $pathTemp = Document::getPathFile('temp/');
        $pathTempWithFilename = Document::getPathFile('temp/' . self::filename($document));

        if (!file_exists($pathTemp)) {
            throw new RuntimeException(Yii::t('api', 'Файл не существует ({hash})', ['hash' => $hash]));
        }

        return $pathTempWithFilename;
    }

    private static function moveFileFromTempToTargetDirectory(
        Document $document,
        string $hash,
        int $activeRecordId,
        string $modelName,
        string $pathTempWithFilename
    ): void {
        $activeRecordId = $activeRecordId;
        $nameModelAndId = "{$modelName}/{$activeRecordId}/";
        $pathNew = Document::getPathFile($nameModelAndId);

        if (!FileHelper::createDirectory($pathNew)) {
            throw new RuntimeException(Yii::t('api', 'Не удалось создать директорию для хранения файлов'));
        }

        $pathNewWithFilename = $pathNew . self::filename($document);

        try {
            rename($pathTempWithFilename, $pathNewWithFilename);
        } catch (\Throwable $th) {
            throw new RuntimeException(
                Yii::t('api', 'Файл не найден ({hash})', ['hash' => $hash])
            );
        }
    }

    private static function updateDocument(
        Document $document,
        string $hash,
        string $kind,
        string $modelName,
        int $activeRecordId
    ): void {
        $document->kind = $kind;
        $document->model_name = $modelName;
        $document->active_record_id = $activeRecordId;

        if (!$document->save()) {
            throw new RuntimeException(
                Yii::t('api', 'Не удалось изменить запись о документе ({hash})', ['hash' => $hash])
            );
        }
    }
}
