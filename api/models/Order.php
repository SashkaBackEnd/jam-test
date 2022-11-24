<?php

declare(strict_types=1);

namespace api\models;

use api\interfaces\CityInterface;
use api\interfaces\CountryInterface;
use api\interfaces\RegionInterface;
use common\models\base\query\CitiesQuery;
use common\models\Order as CommonOrder;
use common\models\query\UserQuery;
use Exception;
use yii\db\ActiveQueryInterface;

class Order extends CommonOrder implements CountryInterface, RegionInterface, CityInterface
{
    /**
     * @return ActiveQueryInterface
     */
    public function getInvoice(): ActiveQueryInterface
    {
        return $this->hasOne(Invoice::className(), ['horder__id' => 'id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getWarehouse(): ActiveQueryInterface
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'war_warehouse__id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getPayType(): ActiveQueryInterface
    {
        return $this->hasOne(OrderPayType::className(), ['id' => 'store_pay_types__id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getAuthor(): ActiveQueryInterface
    {
        return $this->hasOne(User::className(), ['id' => 'users__id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return ActiveQueryInterface
     */
    public function getCountry(): ActiveQueryInterface
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country__id'])
            ->andWhere(['type' => 1]);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQueryInterface
     */
    public function getRegion(): ActiveQueryInterface
    {
        return $this->hasOne(Region::className(), ['region_id' => 'region__id'])
            ->andWhere(['type' => 2]);
    }

    /**
     * Gets query for [[City]].
     *
     * @return ActiveQueryInterface
     */
    public function getCity(): ActiveQueryInterface
    {
        return $this->hasOne(City::className(), ['city_id' => 'city__id'])
            ->andWhere(['type' => 3]);
    }

    /**
     * @param string|null $className
     * @return ActiveQueryInterface
     * @throws Exception
     */
    public function getItems(string $className = null): ActiveQueryInterface
    {
        return parent::getItems(OrderItem::class);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\StoreHordersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreHordersQuery(get_called_class());
    }
}
