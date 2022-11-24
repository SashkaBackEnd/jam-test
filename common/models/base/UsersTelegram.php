<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_telegram".
 *
 * @property int $id
 * @property int|null $users__id
 * @property string|null $telegram_username
 * @property int|null $telegram_id
 * @property int $is_active 	1 - Отправлять сообщения; 0 - Нет;
 * @property int|null $is_sync
 * @property string|null $sync_code
 * @property string|null $sync_code_created_at
 * @property int|null $sync_attempts
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersTelegram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_telegram';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'telegram_id', 'is_active', 'is_sync', 'sync_attempts', 'created_by', 'modified_by'], 'integer'],
            [['sync_code_created_at', 'created_at', 'modified_at'], 'safe'],
            [['telegram_username', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['sync_code'], 'string', 'max' => 6],
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
            'telegram_username' => 'Telegram Username',
            'telegram_id' => 'Telegram ID',
            'is_active' => 'Is Active',
            'is_sync' => 'Is Sync',
            'sync_code' => 'Sync Code',
            'sync_code_created_at' => 'Sync Code Created At',
            'sync_attempts' => 'Sync Attempts',
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
     * @return \common\models\base\query\UsersTelegramQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersTelegramQuery(get_called_class());
    }
}
