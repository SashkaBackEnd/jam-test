<?php

namespace api\models;

use api\models\war\WarehouseLang;
use common\models\base\query\CitiesQuery;
use common\models\base\WarWarehouse as BaseWarWarehouse;
use yii\db\ActiveQueryInterface;

class Warehouse extends BaseWarWarehouse
{
    public function getName(): string
    {
        return $this->lang->name;
    }

    public function getAddress(): string
    {
        return $this->lang->adress;
    }

    public function getInfo(): string
    {
        return $this->lang->info;
    }

    /**
     * Gets query for [[WarehouseLang]].
     *
     * @return ActiveQueryInterface
     */
    public function getLang(): ActiveQueryInterface
    {
        return $this->hasOne(WarehouseLang::className(), ['war_warehouse__id' => 'id'])
            ->where([WarehouseLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return ActiveQueryInterface
     */
    public function getInvoice(): ActiveQueryInterface
    {
        return $this->hasOne(Invoice::className(), ['object_id_from' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return ActiveQueryInterface
     */
    public function getInvoices(): ActiveQueryInterface
    {
        return $this->hasMany(Invoice::className(), ['object_id_from' => 'id']);
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
