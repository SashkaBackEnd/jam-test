<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_smsconfirmation".
 *
 * @property int $id
 * @property int|null $users__id
 * @property string|null $username Логин
 * @property string|null $password Пароль
 * @property string|null $phone Телефон
 * @property string|null $code
 * @property string|null $text SMS-текст
 * @property string|null $session_guid Сессия Yii
 * @property string|null $date_end Дата, до которой актуальная запись
 * @property int|null $smsconfirmation_types__id Тип подтверждения
 * @property int|null $smsconfirmation_statuses__id Статус подтверждения
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UserSmsconfirmation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_smsconfirmation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'smsconfirmation_types__id', 'smsconfirmation_statuses__id', 'created_by', 'modified_by'], 'integer'],
            [['date_end', 'created_at', 'modified_at'], 'safe'],
            [['username', 'code', 'text'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 32],
            [['session_guid'], 'string', 'max' => 8],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'username' => 'Username',
            'password' => 'Password',
            'phone' => 'Phone',
            'code' => 'Code',
            'text' => 'Text',
            'session_guid' => 'Session Guid',
            'date_end' => 'Date End',
            'smsconfirmation_types__id' => 'Smsconfirmation Types  ID',
            'smsconfirmation_statuses__id' => 'Smsconfirmation Statuses  ID',
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
     * @return \common\models\base\query\UserSmsconfirmationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UserSmsconfirmationQuery(get_called_class());
    }
}
