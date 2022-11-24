<?php

declare(strict_types=1);

namespace api\models;

use common\models\base\WarHorders as BaseWarHorders;
use yii\base\InvalidConfigException;
use yii\db\ActiveQueryInterface;

class Invoice extends BaseWarHorders
{
    /**
     * @return float|null
     */
    public function getCost(): ?float
    {
        return $this->delivery_price + $this->amount;
    }

    /**
     * @return float|null
     */
    public function getFio(): ?float
    {
        return $this->object_alias_to + $this->amount;
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getStatus(): ActiveQueryInterface
    {
        return $this->hasOne(InvoiceStatus::className(), ['id' => 'status__id']);
    }

    /**
     * @return ActiveQueryInterface
     * @throws InvalidConfigException
     */
    public function getTo(): ActiveQueryInterface
    {
        return match ($this->object_alias_to) {
            'user' => $this->hasOne(User::className(), ['id' => 'object_id_to']),
            'warehouse' => $this->hasOne(User::className(), ['id' => 'users__id'])
                ->viaTable(Warehouse::tableName(), ['id' => 'object_id_to']),
        };
    }

    /**
     * @return ActiveQueryInterface
     * @throws InvalidConfigException
     */
    public function getFrom(): ActiveQueryInterface
    {
        return match ($this->object_alias_from) {
            'user' => $this->hasOne(User::className(), ['id' => 'object_alias_from']),
            'warehouse' => $this->hasOne(User::className(), ['id' => 'users__id'])
                ->viaTable(Warehouse::tableName(), ['id' => 'object_alias_from']),
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
     * @throws InvalidConfigException
     */
    public function getStorekeeper(): ActiveQueryInterface
    {
        return $this->hasOne(Storekeeper::className(), ['id' => 'storekeeper__id']);
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
