<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_to_create".
 *
 * @property int $id
 * @property string $from_name
 * @property string|null $from
 * @property string|null $subject
 * @property string|null $altbody
 * @property string|null $body
 * @property int|null $is_delivery
 * @property string|null $status_alias
 * @property int|null $attempts_count
 * @property int|null $created_count
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 */
class MailLettersToCreate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_to_create';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_name', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['altbody', 'body'], 'string'],
            [['is_delivery', 'attempts_count', 'created_count', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['from_name', 'status_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['from', 'subject'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_name' => 'From Name',
            'from' => 'From',
            'subject' => 'Subject',
            'altbody' => 'Altbody',
            'body' => 'Body',
            'is_delivery' => 'Is Delivery',
            'status_alias' => 'Status Alias',
            'attempts_count' => 'Attempts Count',
            'created_count' => 'Created Count',
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
     * @return \common\models\base\query\MailLettersToCreateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersToCreateQuery(get_called_class());
    }
}
