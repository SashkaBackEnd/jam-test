<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "auth_tokens".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int|null $type_password Тип пароля 0 - Основной, 1 - Финансовый
 * @property string|null $ip_address
 * @property string|null $http_user_agent
 * @property int|null $confirmed
 * @property string|null $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AuthTokens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'type_password', 'confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['ip_address', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['http_user_agent'], 'string', 'max' => 500],
            [['value'], 'string', 'max' => 32],
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
            'type_password' => 'Type Password',
            'ip_address' => 'Ip Address',
            'http_user_agent' => 'Http User Agent',
            'confirmed' => 'Confirmed',
            'value' => 'Value',
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
     * @return \common\models\base\query\AuthTokensQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AuthTokensQuery(get_called_class());
    }
}
