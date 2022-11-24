<?php

declare(strict_types=1);

namespace api\models;

use api\models\user\Permission;
use api\models\Warehouse;
use common\models\base\query\ProfileLangQuery;
use common\models\base\query\ProfileQuery;
use common\models\base\query\WarWarehouseQuery;
use common\models\User as CommonUser;
use yii\db\ActiveQuery;
use yii\db\ActiveQueryInterface;
use yii\web\IdentityInterface;

class User extends CommonUser implements IdentityInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getFio();
    }

    /**
     * @return string|null
     */
    public function getFio(): ?string
    {
        $profileLang = $this->getProfileLang()->where(['lang' => 'ru'])->one();
        ($profileLang->first_name) and $name[] = $profileLang->first_name;
        ($profileLang->last_name) and $name[] = $profileLang->last_name;
        ($profileLang->second_name) and $name[] = $profileLang->second_name;
        return isset($name) ? implode(' ', $name) : null;
    }

    public function getFirst_name(): ?string
    {
        return $this->profile->lang->first_name ?? null;
    }

    public function getLast_name(): ?string
    {
        return $this->profile->lang->last_name ?? null;
    }

    public function getSecond_name(): ?string
    {
        return $this->profile->lang->second_name ?? null;
    }

    public function getAddress(): ?string
    {
        return $this->profile->lang->second_name ?? null;
    }

    /**
     * @return Permission
     */
    public function getPermissions(): Permission
    {
        return new Permission($this);
    }

    /**
     * Gets query for [[Request]].
     *
     * @return ActiveQueryInterface|CalendarEvents
     */
    public function getCalendarEvents(): ActiveQueryInterface|CalendarEvents
    {
        return $this->hasMany(CalendarEvents::class, ['users__id' => 'id']);
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Request::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return ActiveQuery|ProfileQuery
     */
    public function getProfile(): ActiveQuery|ProfileQuery
    {
        return $this->hasOne(Profile::className(), ['user__id' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return ActiveQuery|WarWarehouseQuery
     */
    public function getWarehouse(): ActiveQuery|WarWarehouseQuery
    {
        return $this->hasOne(Warehouse::className(), ['users__id' => 'id']);
    }

    /**
     * Gets query for [[ProfileLang]].
     *
     * @return ActiveQuery|ProfileLangQuery
     */
    public function getProfileLang(): ActiveQuery|ProfileLangQuery
    {
        return $this->hasOne(ProfileLang::className(), ['user__id' => 'id']);
    }

    /**
     * @param string|null $className
     * @return ActiveQueryInterface
     * @throws Exception
     */
    public function getOrders(string $className = null): ActiveQueryInterface
    {
        return parent::getOrders(Order::class);
    }
}
