<?php

namespace api\modules\graphql\forms;

use api\exceptions\NotFoundException;
use api\exceptions\RuntimeException;
use api\models\{Company, Document, User};
use Yii;
use yii\base\Model;

/**
 * Форма для пометки документа как удаленный
 */
class DocumentDeleteForm extends Model
{
    public string $hash;
    public User $user;
    public string $entity_name;
    public int $entity_number;

    public function rules()
    {
        return [
            [['hash', 'entity_name', 'entity_number'], 'required'],
            [['hash', 'entity_name'], 'string'],
            ['entity_number', 'integer'],
        ];
    }

    public function markDelete(): bool
    {
        $document = $this->getDocument();

        $document->is_deleted = true;
        $isDeleted = $document->save();

        $this->companyUpdateViaDocument($document);

        if (!$isDeleted) {
            throw (new RuntimeException(Yii::t('api', 'Не удалось удалить документ')))
                ->setContext(['fields' => $document->getErrors()]);
        }

        return true;
    }

    private function companyUpdateViaDocument(Document $document)
    {
        if ($document->model_name == 'company') {
            $company = Company::findOne(['id' => $document->active_record_id]);

            if ($company) {
                if (!Document::existsDocumentsByCompanyId($document->id)) {
                    $company->verification_status = Company::VERIFICATION_STATUS_NO;

                    if (!$company->save()) {
                        Yii::warning([
                            'msg' => 'Не удалось изменить компанию при удалении документов',
                            'company' => $company,
                            'document' => $document,
                        ], __CLASS__);
                    }
                }
            } else {
                Yii::warning([
                    'msg' => 'Не найдена компания для указанного документа',
                    'document' => $document,
                ], __CLASS__);
            }
        }
    }

    private function getDocument(): Document
    {
        $document = Document::find()->where(['hash' => $this->hash, 'is_deleted' => false])->one();

        if (!$document) {
            throw new NotFoundException(Yii::t('api', 'Документ не найден'));
        }

        return $document;
    }
}
