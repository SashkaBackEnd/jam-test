<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_security_settings".
 *
 * @property int $id
 * @property int|null $users__id
 * @property string|null $send_code_method Способ получения кода подтверждения
 * @property int|null $secure_auth_enabled Включить дополнительный способ подтверждения для авторизации
 * @property int|null $secure_payout_enabled Включить дополнительный способ подтверждения для вывода средств
 * @property string|null $ga_secret
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersSecuritySettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_security_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'secure_auth_enabled', 'secure_payout_enabled', 'created_by', 'modified_by'], 'integer'],
            [['send_code_method'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['ga_secret'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'send_code_method' => 'Send Code Method',
            'secure_auth_enabled' => 'Secure Auth Enabled',
            'secure_payout_enabled' => 'Secure Payout Enabled',
            'ga_secret' => 'Ga Secret',
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
     * @return \common\models\base\query\UsersSecuritySettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersSecuritySettingsQuery(get_called_class());
    }
}
