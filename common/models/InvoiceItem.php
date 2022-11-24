<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\WarOrders as BaseWarOrders;
use yii\db\ActiveQueryInterface;

class InvoiceItem extends BaseWarOrders
{
    /**
     * @return ActiveQueryInterface
     */
    public function getInvoice(): ActiveQueryInterface
    {
        return $this->hasOne(Invoice::className(), ['id' => 'horder__id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getProduct(): ActiveQueryInterface
    {
        return $this->hasOne(Product::className(), ['id' => 'product__id']);
    }
}
