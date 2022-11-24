<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property int|null $sender_id ID пользователя (users.id), который отправил сообщение
 * @property int|null $recipient_id ID конкретного пользователя (users.id), который получил сообщение. Или состояния, перечень значений которых смотреть в моделе message
 * @property string|null $date Дата создания сообщения
 * @property string|null $title Заголовок сообщения
 * @property string|null $text Текст сообщения
 * @property int $level_sender
 * @property string|null $upline Путь от вершины структуры к отправителю. Для древовидной структуры. Истользуется для только для сообщения подструктуре
 * @property int $is_auto Отправлено автоматически
 * @property int|null $is_allowed_view_before_register Статус отображения пользователям, регистраия которых проходила после его создания
 * @property string|null $created_at Техническое поле. Дата создания записи
 * @property int|null $created_by Техническое поле. ID пользователя (users.id), который создал запись
 * @property string|null $modified_at Техническое поле. Дата редактирования записи
 * @property int|null $modified_by Техническое поле. ID пользователя (users.id), который отредактировал запись
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender_id', 'recipient_id', 'level_sender', 'is_auto', 'is_allowed_view_before_register', 'created_by', 'modified_by'], 'integer'],
            [['date', 'created_at', 'modified_at'], 'safe'],
            [['text'], 'string'],
            [['level_sender'], 'required'],
            [['title'], 'string', 'max' => 200],
            [['upline'], 'string', 'max' => 4096],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_id' => 'Sender ID',
            'recipient_id' => 'Recipient ID',
            'date' => 'Date',
            'title' => 'Title',
            'text' => 'Text',
            'level_sender' => 'Level Sender',
            'upline' => 'Upline',
            'is_auto' => 'Is Auto',
            'is_allowed_view_before_register' => 'Is Allowed View Before Register',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MessagesQuery(get_called_class());
    }
}
