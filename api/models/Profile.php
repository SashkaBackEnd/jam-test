<?php

declare(strict_types=1);

namespace api\models;

use api\interfaces\CityInterface;
use api\interfaces\CountryInterface;
use api\interfaces\RegionInterface;
use common\extensions\BehaviorHelper;
use common\models\base\Profile as BaseProfile;
use common\models\base\query\CitiesQuery;
use common\models\base\query\ProfileLangQuery;
use common\models\base\query\ProfileQuery;
use common\models\query\UserQuery;
use yii\base\InvalidConfigException;
use yii\db\ActiveQueryInterface;

class Profile extends BaseProfile implements CountryInterface, RegionInterface, CityInterface
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
                'author_id' => BehaviorHelper::getBehaviorBy(),
                'author_ip' => BehaviorHelper::getBehaviorIp(),
                'author_timestamp' => BehaviorHelper::getBehaviorAt(),
            ] + parent::behaviors();
    }

    /**
     * @return string|null
     */
    public function getFio(): ?string
    {
        $profileLang = $this->getLang()->where(['lang' => 'ru'])->one();
        ($profileLang->first_name) and $name[] = $profileLang->first_name;
        ($profileLang->last_name) and $name[] = $profileLang->last_name;
        ($profileLang->second_name) and $name[] = $profileLang->second_name;
        return isset($name) ? implode(' ', $name) : null;
    }

    public function getFirst_name(): ?string
    {
        return $this->lang->first_name ?? null;
    }

    public function getLast_name(): ?string
    {
        return $this->lang->last_name ?? null;
    }

    public function getSecond_name(): ?string
    {
        return $this->lang->second_name ?? null;
    }

    public function getAddress(): ?string
    {
        return $this->lang->second_name ?? null;
    }

    /**
     * Gets query for [[Request]].
     *
     * @return ActiveQueryInterface|UserQuery
     * @throws InvalidConfigException
     */
    public function getChildren(): ActiveQueryInterface|UserQuery
    {
        return $this->hasMany(User::class, ['id' => 'user__id'])
            ->viaTable(Profile::tableName(), ['sponsor__id' => 'user__id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQueryInterface|UserQuery
     */
    public function getSponsor(): ActiveQueryInterface|UserQuery
    {
        return $this->hasOne(User::className(), ['id' => 'sponsor__id']);
    }

    /**
     * Gets query for [[ProfileLang]].
     *
     * @return ActiveQueryInterface|ProfileLangQuery
     */
    public function getLang(): ActiveQueryInterface|ProfileLangQuery
    {
        return $this->hasOne(ProfileLang::className(), ['profile__id' => 'id'])
            ->where([ProfileLang::tableName().'.lang' => 'ru']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return ActiveQueryInterface|CitiesQuery
     */
    public function getCountry(): ActiveQueryInterface|CitiesQuery
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country__id'])
            ->andWhere(['type' => 1]);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQueryInterface|CitiesQuery
     */
    public function getRegion(): ActiveQueryInterface|CitiesQuery
    {
        return $this->hasOne(Region::className(), ['region_id' => 'region__id'])
            ->andWhere(['type' => 2]);
    }

    /**
     * Gets query for [[City]].
     *
     * @return ActiveQueryInterface|CitiesQuery
     */
    public function getCity(): ActiveQueryInterface|CitiesQuery
    {
        return $this->hasOne(City::className(), ['city_id' => 'city__id'])
            ->andWhere(['type' => 3]);
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find(): ProfileQuery
    {
        return new ProfileQuery(get_called_class());
    }
}
