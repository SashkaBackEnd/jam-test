<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "telegram_messages".
 *
 * @property int $id
 * @property int|null $recipient_telegram__id
 * @property int|null $telegram_messages_types__id
 * @property string|null $text
 * @property string|null $status_alias
 * @property string|null $error_description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TelegramMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipient_telegram__id', 'telegram_messages_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['text'], 'string', 'max' => 4000],
            [['status_alias'], 'string', 'max' => 20],
            [['error_description', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipient_telegram__id' => 'Recipient Telegram  ID',
            'telegram_messages_types__id' => 'Telegram Messages Types  ID',
            'text' => 'Text',
            'status_alias' => 'Status Alias',
            'error_description' => 'Error Description',
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
     * @return \common\models\base\query\TelegramMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TelegramMessagesQuery(get_called_class());
    }
}
