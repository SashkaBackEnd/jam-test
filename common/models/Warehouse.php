<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\query\CitiesQuery;
use common\models\base\WarWarehouse as BaseWarWarehouse;
use common\models\base\WarWarehouseLang;
use yii\db\ActiveQueryInterface;

class Warehouse extends BaseWarWarehouse
{
    /**
     * Gets query for [[ProfileLang]].
     *
     * @return ActiveQueryInterface
     */
    public function getLang(): ActiveQueryInterface
    {
        return $this->hasOne(WarWarehouseLang::class, ['war_warehouse__id' => 'id'])
            ->where([WarWarehouseLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return ActiveQueryInterface|CitiesQuery
     */
    public function getCountry(): ActiveQueryInterface|CitiesQuery
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id'])
            ->andWhere(['type' => 1]);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQueryInterface|CitiesQuery
     */
    public function getRegion(): ActiveQueryInterface|CitiesQuery
    {
        return $this->hasOne(Region::className(), ['region_id' => 'region_id'])
            ->andWhere(['type' => 2]);
    }

    /**
     * Gets query for [[City]].
     *
     * @return ActiveQueryInterface|CitiesQuery
     */
    public function getCity(): ActiveQueryInterface|CitiesQuery
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id'])
            ->andWhere(['type' => 3]);
    }
}
