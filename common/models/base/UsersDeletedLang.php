<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_deleted_lang".
 *
 * @property int $id
 * @property string|null $lang
 * @property int|null $user__id
 * @property int|null $profile__id
 * @property string $first_name
 * @property string $last_name
 * @property string $second_name
 * @property string|null $address
 * @property string|null $country_name
 * @property string|null $passport_country_name Страна прописки
 * @property string|null $passport_region_name Область прописки
 * @property string|null $passport_city_name Город прописки
 * @property string|null $region_name
 * @property string|null $city_name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersDeletedLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_deleted_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'profile__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['first_name', 'last_name', 'second_name'], 'string', 'max' => 255],
            [['address', 'country_name', 'passport_country_name', 'passport_region_name', 'passport_city_name', 'region_name', 'city_name'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['lang', 'user__id'], 'unique', 'targetAttribute' => ['lang', 'user__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'user__id' => 'User  ID',
            'profile__id' => 'Profile  ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'second_name' => 'Second Name',
            'address' => 'Address',
            'country_name' => 'Country Name',
            'passport_country_name' => 'Passport Country Name',
            'passport_region_name' => 'Passport Region Name',
            'passport_city_name' => 'Passport City Name',
            'region_name' => 'Region Name',
            'city_name' => 'City Name',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UsersDeletedLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersDeletedLangQuery(get_called_class());
    }
}
