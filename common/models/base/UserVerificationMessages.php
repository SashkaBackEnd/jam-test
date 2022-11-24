<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_verification_messages".
 *
 * @property int $id
 * @property int|null $users__id_sender Отправитель сообщения
 * @property int|null $users__id_recipient Получатель сообщения. Актуально при is_admin_message = 1
 * @property string|null $send_at Дата отправки сообщения
 * @property int $is_admin_message 0 - сообщение отправил пользователь, 1 - сообщение отправил модератор
 * @property int $is_answer_message Ответил ли модератор на сообщение пользователя, актуально при is_admin_message = 0. 0 - не ответил, 1 - ответил
 * @property string|null $text
 * @property int $is_deleted В перспективе для возможности удалять сообщения: 0 - сообщение актуальное, 1 - сообщение удалено
 * @property string|null $verificated_step
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UserVerificationMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_verification_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id_sender', 'users__id_recipient', 'is_admin_message', 'is_answer_message', 'is_deleted', 'created_by', 'modified_by'], 'integer'],
            [['send_at', 'created_at', 'modified_at'], 'safe'],
            [['text'], 'string'],
            [['verificated_step'], 'string', 'max' => 255],
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
            'users__id_sender' => 'Users  Id Sender',
            'users__id_recipient' => 'Users  Id Recipient',
            'send_at' => 'Send At',
            'is_admin_message' => 'Is Admin Message',
            'is_answer_message' => 'Is Answer Message',
            'text' => 'Text',
            'is_deleted' => 'Is Deleted',
            'verificated_step' => 'Verificated Step',
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
     * @return \common\models\base\query\UserVerificationMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UserVerificationMessagesQuery(get_called_class());
    }
}
