<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "auth_additional".
 *
 * @property int $id
 * @property int|null $user__id
 * @property int $auth_attempts Количество некорректных попыток авторизации после последней корректной
 * @property int $auth_status Статус учетной записи для авторизации: 0 - нормальный, 1 - нужно подтверждение, 2 - заблокировано
 * @property string $auth_confirmation_code Код подтверждения
 * @property string $auth_confirmation_datetime Время отправки кода подтверждения
 * @property int $auth_confirmation_count Количество отправленных кодов подтверждения
 * @property string|null $last_ip
 * @property string|null $last_browser
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AuthAdditional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_additional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'auth_attempts', 'auth_status', 'auth_confirmation_count', 'created_by', 'modified_by'], 'integer'],
            [['auth_confirmation_datetime', 'created_at', 'modified_at'], 'safe'],
            [['auth_confirmation_code'], 'string', 'max' => 10],
            [['last_ip', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['last_browser'], 'string', 'max' => 500],
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
            'auth_attempts' => 'Auth Attempts',
            'auth_status' => 'Auth Status',
            'auth_confirmation_code' => 'Auth Confirmation Code',
            'auth_confirmation_datetime' => 'Auth Confirmation Datetime',
            'auth_confirmation_count' => 'Auth Confirmation Count',
            'last_ip' => 'Last Ip',
            'last_browser' => 'Last Browser',
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
     * @return \common\models\base\query\AuthAdditionalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AuthAdditionalQuery(get_called_class());
    }
}
