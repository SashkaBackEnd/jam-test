<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\WarHordersStatus as BaseWarHordersStatus;
use common\models\base\WarHordersStatusLang;
use yii\db\ActiveQueryInterface;

class InvoiceStatus extends BaseWarHordersStatus
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
        return $this->hasOne(WarHordersStatusLang::className(), ['war_horders_status__id' => 'id'])
            ->where([WarHordersStatusLang::tableName() . '.lang' => 'ru']);
    }
}
