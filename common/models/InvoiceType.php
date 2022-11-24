<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\WarHordersType as BaseWarHordersType;
use common\models\base\WarHordersTypeLang;
use yii\db\ActiveQueryInterface;

class InvoiceType extends BaseWarHordersType
{
    public function getName(): ?string
    {
        return $this->lang->name;
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getLang(): ActiveQueryInterface
    {
        return $this->hasOne(WarHordersTypeLang::className(), ['war_horders_type__id' => 'id'])
            ->where([WarHordersTypeLang::tableName() . '.lang' => 'ru']);
    }
}
