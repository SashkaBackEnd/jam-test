<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\WarHorders as BaseWarHorders;
use yii\db\ActiveQueryInterface;

class Invoice extends BaseWarHorders
{

    /**
     * @return ActiveQueryInterface
     */
    public function getStatus(): ActiveQueryInterface
    {
        return $this->hasOne(InvoiceStatus::className(), ['id' => 'status__id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getToStorekeeper(): ActiveQueryInterface
    {
        return match ($this->object_alias_to) {
            'user' => $this->hasOne(User::className(), ['id' => 'object_id_to']),
            'warehouse' => $this->hasOne(Warehouse::class, ['id' => 'object_id_to']),
        };
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getFromStorekeeper(): ActiveQueryInterface
    {
        return match ($this->object_alias_from) {
            'user' => $this->hasOne(User::className(), ['id' => 'object_id_from']),
            'warehouse' => $this->hasOne(Warehouse::class, ['id' => 'object_id_from'])
        };
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getType(): ActiveQueryInterface
    {
        return $this->hasOne(InvoiceType::className(), ['id' => 'type__id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getStorekeeper(): ActiveQueryInterface
    {
        return $this->hasOne(User::className(), ['id' => 'storekeeper__id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getItems(): ActiveQueryInterface
    {
        return $this->hasMany(InvoiceItem::className(), ['horder__id' => 'id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getOrder(): ActiveQueryInterface
    {
        return $this->hasOne(Order::className(), ['id' => 'horder__id']);
    }
}
