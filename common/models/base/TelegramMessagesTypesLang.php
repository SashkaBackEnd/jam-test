<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "telegram_messages_types_lang".
 *
 * @property int $id
 * @property int|null $telegram_messages_types__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TelegramMessagesTypesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_messages_types_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram_messages_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['telegram_messages_types__id', 'lang'], 'unique', 'targetAttribute' => ['telegram_messages_types__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_messages_types__id' => 'Telegram Messages Types  ID',
            'lang' => 'Lang',
            'title' => 'Title',
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
     * @return \common\models\base\query\TelegramMessagesTypesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TelegramMessagesTypesLangQuery(get_called_class());
    }
}
