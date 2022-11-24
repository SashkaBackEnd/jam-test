<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_old".
 *
 * @property int $id
 * @property int|null $mail_letters_body__id
 * @property string $from_name
 * @property string|null $from
 * @property string|null $to
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
 */
class MailLettersOld extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_old';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_letters_body__id', 'is_delivery', 'attempts_count', 'created_by', 'modified_by'], 'integer'],
            [['from_name', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['altbody', 'body'], 'string'],
            [['posted_at', 'created_at', 'modified_at'], 'safe'],
            [['from_name', 'status_alias', 'client_letter_id', 'client_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['from', 'to', 'message_id'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MailLettersOldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersOldQuery(get_called_class());
    }
}
