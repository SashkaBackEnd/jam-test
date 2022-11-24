<?php

declare(strict_types=1);

namespace api\models;

use common\models\OrderItem as CommonOrderItem;
use yii\db\ActiveQueryInterface;

class OrderItem extends CommonOrderItem
{
    /**
     * @return ActiveQueryInterface
     */
    public function getProduct(): ActiveQueryInterface
    {
        return $this->hasOne(Product::className(), ['id' => 'catalogues_products__id']);
    }
}
