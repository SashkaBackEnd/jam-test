<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ProductsToUsersDiscount]].
 *
 * @see \common\models\base\ProductsToUsersDiscount
 */
class ProductsToUsersDiscountQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProductsToUsersDiscount[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProductsToUsersDiscount|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
