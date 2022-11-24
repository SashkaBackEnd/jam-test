<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters".
 *
 * @property int $id
 * @property string|null $mail_letters_body__id
 * @property string $from_name
 * @property string|null $from
 * @property string|null $to
 * @property string|null $mail_agent
 * @property string|null $subject
 * @property string|null $altbody
 * @property string|null $body
 * @property int|null $is_delivery
 * @property string|null $status_alias
 * @property int|null $attempts_count
 * @property string|null $message_id
 * @property string|null $delivery_code1
 * @property string|null $delivery_code2
 * @property string|null $delivery_status
 * @property string|null $delivery_desc
 * @property string|null $posted_at
 * @property string|null $client_letter_id
 * @property string|null $client_owner
 * @property string|null $unsubscribe
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 * @property string|null $feedback_email
 */
class MailLetters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_name', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['altbody', 'body'], 'string'],
            [['is_delivery', 'attempts_count', 'created_by', 'modified_by'], 'integer'],
            [['posted_at', 'created_at', 'modified_at'], 'safe'],
            [['mail_letters_body__id', 'from_name', 'status_alias', 'client_letter_id', 'client_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['from', 'to', 'message_id', 'feedback_email'], 'string', 'max' => 255],
            [['mail_agent'], 'string', 'max' => 30],
            [['subject'], 'string', 'max' => 4000],
            [['delivery_code1', 'delivery_code2', 'delivery_status'], 'string', 'max' => 16],
            [['delivery_desc'], 'string', 'max' => 1024],
            [['unsubscribe'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail_letters_body__id' => 'Mail Letters Body  ID',
            'from_name' => 'From Name',
            'from' => 'From',
            'to' => 'To',
            'mail_agent' => 'Mail Agent',
            'subject' => 'Subject',
            'altbody' => 'Altbody',
            'body' => 'Body',
            'is_delivery' => 'Is Delivery',
            'status_alias' => 'Status Alias',
            'attempts_count' => 'Attempts Count',
            'message_id' => 'Message ID',
            'delivery_code1' => 'Delivery Code1',
            'delivery_code2' => 'Delivery Code2',
            'delivery_status' => 'Delivery Status',
            'delivery_desc' => 'Delivery Desc',
            'posted_at' => 'Posted At',
            'client_letter_id' => 'Client Letter ID',
            'client_owner' => 'Client Owner',
            'unsubscribe' => 'Unsubscribe',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'feedback_email' => 'Feedback Email',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MailLettersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersQuery(get_called_class());
    }
}
