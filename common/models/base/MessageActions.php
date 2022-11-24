<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "message_actions".
 *
 * @property int $id
 * @property int $message_id ID сообщения (messages.id), с которым связана запись
 * @property int $user_id ID пользователя (users.id), кому принадлежит данная запись
 * @property int $is_deleted Флаг состояния. Удалено ли сообщение или нет (1, 0 соответственно)
 * @property string|null $deleted_at Дата, когда сообщение было удалено
 * @property int $is_readed Флаг состояния. Прочитано ли сообщение или нет (1, 0 соответственно)
 * @property string|null $readed_at Дата, когда сообщение было прочитано
 * @property int $is_spamed Флаг состояния. SPAM ли сообщение или нет (1, 0 соответственно)
 * @property string|null $spamed_at Дата, когда сообщение было отправлено в спам
 * @property int $is_important Флаг состояния. отмечено ли сообщение как важное или нет (1, 0 соответственно)
 * @property string|null $important_at Дата, когда сообщение было отмечено как важное
 * @property string|null $created_at Техническое поле. Дата создания записи
 * @property int|null $created_by Техническое поле. ID пользователя (users.id), который создал запись
 * @property string|null $modified_at Техническое поле. Дата редактирования записи
 * @property int|null $modified_by Техническое поле. ID пользователя (users.id), который отредактировал запись
 */
class MessageActions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message_actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message_id', 'user_id'], 'required'],
            [['message_id', 'user_id', 'is_deleted', 'is_readed', 'is_spamed', 'is_important', 'created_by', 'modified_by'], 'integer'],
            [['deleted_at', 'readed_at', 'spamed_at', 'important_at', 'created_at', 'modified_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_id' => 'Message ID',
            'user_id' => 'User ID',
            'is_deleted' => 'Is Deleted',
            'deleted_at' => 'Deleted At',
            'is_readed' => 'Is Readed',
            'readed_at' => 'Readed At',
            'is_spamed' => 'Is Spamed',
            'spamed_at' => 'Spamed At',
            'is_important' => 'Is Important',
            'important_at' => 'Important At',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MessageActionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MessageActionsQuery(get_called_class());
    }
}
