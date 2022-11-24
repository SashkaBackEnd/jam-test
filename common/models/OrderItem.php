<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\StoreOrders as BaseStoreOrders;
use common\models\query\OrderItemQuery;
use yii\db\ActiveQueryInterface;

class OrderItem extends BaseStoreOrders
{
    /**
     * Gets query for [[User]].
     *
     * @return ActiveQueryInterface
     */
    public function getProduct(): ActiveQueryInterface
    {
        return $this->hasOne(Product::className(), ['id' => 'catalogues_products__id']);
    }

    /**
     * {@inheritdoc}
     * @return OrderItemQuery the active query used by this AR class.
     */
    public static function find(): OrderItemQuery
    {
        return new OrderItemQuery(get_called_class());
    }
}
