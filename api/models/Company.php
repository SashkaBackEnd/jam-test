<?php

namespace api\models;

use common\models\base\Company as BaseCompany;
use common\models\base\CompanyLang;

class Company extends BaseCompany
{
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getLang()->where(['lang' => 'ru'])->one()->title ?? null;
    }

    /**
     * Gets query for [[ProfileLang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang(): \yii\db\ActiveQuery
    {
        return $this->hasOne(CompanyLang::className(), ['company__id' => 'id'])
            ->where([CompanyLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * Метод проверяет существующие файлы у компании
     *
     * @param array $files
     * @return void
     */
    public function modifyExistingFiles(array $files): void
    {
        if (empty($files)) {
            $isDeleteAll = true;
            $this->verification_status = Company::VERIFICATION_STATUS_NO;
        } else {
            $isDeleteAll = false;
            $this->verification_status = Company::VERIFICATION_STATUS_CHECK;
        }

        Document::checkModifyFileAndUpdateDocument(
            $files,
            activeRecordId: $this->id,
            modelName: self::tableName(),
            kind: Document::KIND_COMPANY_VERIFICATION,
            isDeleteAll: $isDeleteAll
        );
    }

    /**
     * Метод добавляет новые файлы к компании
     *
     * @param array $files
     * @return void
     */
    public function addNewFiles(array $files): void
    {
        if (!empty($files)) {
            foreach ($files as $hash) {
                Document::moveFileAndUpdateDocument(
                    hash: $hash,
                    activeRecordId: $this->id,
                    modelName: self::tableName(),
                    kind: Document::KIND_COMPANY_VERIFICATION
                );
            }

            $this->verification_status = Company::VERIFICATION_STATUS_CHECK;
        }
    }

    /**
     * @param int $accountId
     * @param int $offset
     * @param int $limit
     * @return Company[]
     */
    public static function getAllByAccountId(int $accountId, int $offset, int $limit = 100): array
    {
        return self::find()->where(['account_id' => $accountId])->limit($limit)->offset($offset)->all();
    }
}
