<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_history".
 *
 * @property int $id
 * @property int $mail_letters__id
 * @property string|null $status_alias
 * @property string|null $info
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 */
class MailLettersHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_letters__id', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['mail_letters__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['status_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['info'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail_letters__id' => 'Mail Letters  ID',
            'status_alias' => 'Status Alias',
            'info' => 'Info',
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
     * @return \common\models\base\query\MailLettersHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersHistoryQuery(get_called_class());
    }
}
