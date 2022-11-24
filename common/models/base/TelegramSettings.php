<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "telegram_settings".
 *
 * @property int $id
 * @property string|null $bot_name
 * @property string|null $bot_token
 * @property string|null $created_at
 * @property int|null $is_active
 * @property int|null $send_new
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TelegramSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['is_active', 'send_new', 'created_by', 'modified_by'], 'integer'],
            [['bot_name', 'bot_token', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bot_name' => 'Bot Name',
            'bot_token' => 'Bot Token',
            'created_at' => 'Created At',
            'is_active' => 'Is Active',
            'send_new' => 'Send New',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\TelegramSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TelegramSettingsQuery(get_called_class());
    }
}
