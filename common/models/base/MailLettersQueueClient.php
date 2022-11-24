<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_queue_client".
 *
 * @property int $id
 * @property string|null $client_name
 * @property int|null $queue
 * @property string|null $mail_domen
 * @property int $count
 * @property int $count_new
 * @property int $count_posted
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MailLettersQueueClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_queue_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['queue', 'count', 'count_new', 'count_posted', 'created_by', 'modified_by'], 'integer'],
            [['count', 'count_new', 'count_posted'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['client_name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['mail_domen'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_name' => 'Client Name',
            'queue' => 'Queue',
            'mail_domen' => 'Mail Domen',
            'count' => 'Count',
            'count_new' => 'Count New',
            'count_posted' => 'Count Posted',
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
     * @return \common\models\base\query\MailLettersQueueClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersQueueClientQuery(get_called_class());
    }
}
