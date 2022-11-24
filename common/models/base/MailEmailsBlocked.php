<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_emails_blocked".
 *
 * @property int $id
 * @property string $email
 * @property int|null $type_block
 * @property int|null $compare
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MailEmailsBlocked extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_emails_blocked';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['type_block', 'compare', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['email', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'type_block' => 'Type Block',
            'compare' => 'Compare',
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
     * @return \common\models\base\query\MailEmailsBlockedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailEmailsBlockedQuery(get_called_class());
    }
}
