<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\Cities as BaseCities;
use common\models\base\CitiesLang;
use yii\db\ActiveQueryInterface;

class Country extends BaseCities
{

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->lang?->name;
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getLang(): ActiveQueryInterface
    {
        return $this->hasOne(CitiesLang::className(), ['city__id' => 'id'])
            ->andWhere([CitiesLang::tableName() . '.lang' => 'ru']);
    }
}
