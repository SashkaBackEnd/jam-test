<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\Company as BaseCompany;
use common\models\base\CompanyLang;
use common\models\base\query\CompanyLangQuery;
use yii\db\ActiveQueryInterface;

class Company extends BaseCompany
{
    /**
     * Gets query for [[ProfileLang]].
     *
     * @return ActiveQueryInterface|CompanyLangQuery
     */
    public function getLang(): ActiveQueryInterface|CompanyLangQuery
    {
        return $this->hasOne(CompanyLang::className(), ['company__id' => 'id'])
            ->where([CompanyLang::tableName() . '.lang' => 'ru']);
    }

}
