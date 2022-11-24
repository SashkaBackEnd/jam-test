<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_deleted".
 *
 * @property int $id
 * @property int|null $user__id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $finpassword
 * @property int|null $sponsor__id
 * @property string|null $upline
 * @property int|null $tree_level
 * @property string|null $phone
 * @property string|null $skype
 * @property string|null $birthday
 * @property int|null $sex
 * @property int|null $country__id
 * @property int|null $region__id
 * @property int|null $city__id
 * @property int|null $passport_country__id Страна прописки
 * @property int|null $passport_region__id Область прописки
 * @property int|null $passport_city__id Город прописки
 * @property int|null $zip_code
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $second_name
 * @property string|null $address
 * @property string|null $series_passport Серия паспорта
 * @property string|null $user__created_at
 * @property int|null $user__created_by
 * @property string|null $user__created_ip
 * @property string|null $user__modified_at
 * @property int|null $user__modified_by
 * @property string|null $user__modified_ip
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersDeleted extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_deleted';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'sponsor__id', 'tree_level', 'sex', 'country__id', 'region__id', 'city__id', 'passport_country__id', 'passport_region__id', 'passport_city__id', 'zip_code', 'user__created_by', 'user__modified_by', 'created_by', 'modified_by'], 'integer'],
            [['birthday', 'user__created_at', 'user__modified_at', 'created_at', 'modified_at'], 'safe'],
            [['username', 'email'], 'string', 'max' => 100],
            [['password', 'finpassword', 'phone'], 'string', 'max' => 20],
            [['upline'], 'string', 'max' => 4096],
            [['skype'], 'string', 'max' => 30],
            [['first_name', 'last_name', 'second_name', 'series_passport', 'user__created_ip', 'user__modified_ip', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'finpassword' => 'Finpassword',
            'sponsor__id' => 'Sponsor  ID',
            'upline' => 'Upline',
            'tree_level' => 'Tree Level',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'country__id' => 'Country  ID',
            'region__id' => 'Region  ID',
            'city__id' => 'City  ID',
            'passport_country__id' => 'Passport Country  ID',
            'passport_region__id' => 'Passport Region  ID',
            'passport_city__id' => 'Passport City  ID',
            'zip_code' => 'Zip Code',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'second_name' => 'Second Name',
            'address' => 'Address',
            'series_passport' => 'Series Passport',
            'user__created_at' => 'User  Created At',
            'user__created_by' => 'User  Created By',
            'user__created_ip' => 'User  Created Ip',
            'user__modified_at' => 'User  Modified At',
            'user__modified_by' => 'User  Modified By',
            'user__modified_ip' => 'User  Modified Ip',
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
     * @return \common\models\base\query\UsersDeletedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersDeletedQuery(get_called_class());
    }
}
