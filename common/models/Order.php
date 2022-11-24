<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\StoreHorders as BaseStoreHorders;
use Exception;
use yii\db\ActiveQueryInterface;

class Order extends BaseStoreHorders
{
    /**
     * @return string|null
     */
    public function getFio(): ?string
    {
        ($this->first_name) and $name[] = $this->first_name;
        ($this->last_name) and $name[] = $this->last_name;
        ($this->second_name) and $name[] = $this->second_name;

        return isset($name) ? implode(' ', $name) : null;
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getItems(string $className = null): ActiveQueryInterface
    {
        if ($className && $className != 'api\models\OrderItem') {
            throw new Exception('Неизвестный класс: ' . $className);
        }

        return $this->hasMany($className ?? OrderItem::className(), ['store_horders__id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQueryInterface
     */
    public function getUser(): ActiveQueryInterface
    {
        return $this->hasOne(User::className(), ['id' => 'users__id']);
    }

}
