<?php

namespace common\models\query;

use common\components\ActiveQuery;
use common\models\OrderItem;
use common\models\Product;

/**
 * This is the ActiveQuery class for [[\common\models\OrderItem]].
 *
 * @see \common\models\OrderItem
 */
class OrderItemQuery extends ActiveQuery
{
    /**
     * @return OrderItemQuery
     */
    public function byProductTypeStartPackage(): OrderItemQuery
    {
        return $this->joinWith('product')
            ->andWhere([Product::tableName() . '.product_type' => 'start_package'])
            ->orderBy(Product::tableName() . '.created_at DESC');
    }

    /**
     * {@inheritdoc}
     * @return OrderItem[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrderItem|array|null
     */
    public function one($db = null): OrderItem|array|null
    {
        return parent::one($db);
    }
}
