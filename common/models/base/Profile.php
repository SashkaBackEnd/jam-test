<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int|null $user__id
 * @property string|null $guid
 * @property int|null $users_register_statuses__id
 * @property int|null $sponsor__id
 * @property int|null $sponsors_blogger__id
 * @property string|null $upline
 * @property int|null $tree_level
 * @property string|null $profile_statuses_alias
 * @property int|null $firstline_count
 * @property int|null $structure_count
 * @property int|null $attachment__id
 * @property string|null $phone
 * @property string|null $skype
 * @property string|null $birthday
 * @property int|null $sex
 * @property string|null $series_passport Серия паспорта
 * @property string|null $taxpayer_identification_number
 * @property string|null $bank_name Название банка
 * @property string|null $checking_account Расчётный счёт
 * @property string|null $bik_number БИК
 * @property int|null $country__id
 * @property int|null $region__id
 * @property int|null $city__id
 * @property int|null $passport_country__id Страна прописки
 * @property int|null $passport_region__id Область прописки
 * @property int|null $passport_city__id Город прописки
 * @property string|null $zip_code
 * @property int $is_confirm_email Подтвердил ли пользователь свой Email
 * @property string|null $new_email
 * @property int $is_recovery_password
 * @property int $profile_type Тип профиля: 1 - профиль пользователя, 2 - профиль компании
 * @property string $second_email Дополнительный Email
 * @property int $lang__id Язык пользователя
 * @property string $website Сайт
 * @property string|null $company_name Название компании
 * @property string|null $company_register_number
 * @property string|null $tax_number Налоговый номер
 * @property string|null $contact_person Контактное лицо
 * @property int|null $users_register_social__id Идентификатор социальной сети из справочника
 * @property string|null $social_id Идентификатор пользователя в соц.сети
 * @property string|null $social_name Имя возращаемое социальной сетью
 * @property int $is_blocked_user Заблокированный прользователь: 0 - пользователь активен, 1 - пользователь заблокирован
 * @property string|null $langs
 * @property string|null $sponsor_selection_option__alias
 * @property string|null $getcourse_uid
 * @property int|null $a_is_connect
 * @property string|null $a_id
 * @property string|null $a_token
 * @property string|null $a_db_id
 * @property string|null $a_connect_date
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property string|null $verification_id
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'users_register_statuses__id', 'sponsor__id', 'sponsors_blogger__id', 'tree_level', 'firstline_count', 'structure_count', 'attachment__id', 'sex', 'country__id', 'region__id', 'city__id', 'passport_country__id', 'passport_region__id', 'passport_city__id', 'is_confirm_email', 'is_recovery_password', 'profile_type', 'lang__id', 'users_register_social__id', 'is_blocked_user', 'a_is_connect', 'created_by', 'modified_by'], 'integer'],
            [['birthday', 'a_connect_date', 'created_at', 'modified_at'], 'safe'],
            [['second_email', 'lang__id', 'website'], 'required'],
            [['guid', 'phone', 'skype'], 'string', 'max' => 32],
            [['upline'], 'string', 'max' => 4096],
            [['profile_statuses_alias', 'new_email', 'langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['series_passport', 'taxpayer_identification_number', 'bank_name', 'checking_account', 'bik_number', 'website', 'company_name', 'company_register_number', 'tax_number', 'contact_person', 'social_id', 'social_name', 'a_id', 'a_token', 'a_db_id', 'verification_id'], 'string', 'max' => 255],
            [['zip_code'], 'string', 'max' => 50],
            [['second_email'], 'string', 'max' => 200],
            [['sponsor_selection_option__alias', 'getcourse_uid'], 'string', 'max' => 20],
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
            'guid' => 'Guid',
            'users_register_statuses__id' => 'Users Register Statuses  ID',
            'sponsor__id' => 'Sponsor  ID',
            'sponsors_blogger__id' => 'Sponsors Blogger  ID',
            'upline' => 'Upline',
            'tree_level' => 'Tree Level',
            'profile_statuses_alias' => 'Profile Statuses Alias',
            'firstline_count' => 'Firstline Count',
            'structure_count' => 'Structure Count',
            'attachment__id' => 'Attachment  ID',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'series_passport' => 'Series Passport',
            'taxpayer_identification_number' => 'Taxpayer Identification Number',
            'bank_name' => 'Bank Name',
            'checking_account' => 'Checking Account',
            'bik_number' => 'Bik Number',
            'country__id' => 'Country  ID',
            'region__id' => 'Region  ID',
            'city__id' => 'City  ID',
            'passport_country__id' => 'Passport Country  ID',
            'passport_region__id' => 'Passport Region  ID',
            'passport_city__id' => 'Passport City  ID',
            'zip_code' => 'Zip Code',
            'is_confirm_email' => 'Is Confirm Email',
            'new_email' => 'New Email',
            'is_recovery_password' => 'Is Recovery Password',
            'profile_type' => 'Profile Type',
            'second_email' => 'Second Email',
            'lang__id' => 'Lang  ID',
            'website' => 'Website',
            'company_name' => 'Company Name',
            'company_register_number' => 'Company Register Number',
            'tax_number' => 'Tax Number',
            'contact_person' => 'Contact Person',
            'users_register_social__id' => 'Users Register Social  ID',
            'social_id' => 'Social ID',
            'social_name' => 'Social Name',
            'is_blocked_user' => 'Is Blocked User',
            'langs' => 'Langs',
            'sponsor_selection_option__alias' => 'Sponsor Selection Option  Alias',
            'getcourse_uid' => 'Getcourse Uid',
            'a_is_connect' => 'A Is Connect',
            'a_id' => 'A ID',
            'a_token' => 'A Token',
            'a_db_id' => 'A Db ID',
            'a_connect_date' => 'A Connect Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'verification_id' => 'Verification ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileQuery(get_called_class());
    }
}
