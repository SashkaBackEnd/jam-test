<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_body".
 *
 * @property int $id
 * @property string|null $subject
 * @property string|null $body
 * @property string|null $clear_body
 * @property string|null $status_alias
 * @property string|null $self_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MailLettersBody extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_body';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body', 'clear_body'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['subject'], 'string', 'max' => 4000],
            [['status_alias', 'self_id', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'body' => 'Body',
            'clear_body' => 'Clear Body',
            'status_alias' => 'Status Alias',
            'self_id' => 'Self ID',
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
     * @return \common\models\base\query\MailLettersBodyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersBodyQuery(get_called_class());
    }
}
