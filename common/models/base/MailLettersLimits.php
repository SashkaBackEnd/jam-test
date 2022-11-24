<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_limits".
 *
 * @property int $id
 * @property string|null $post_name
 * @property string|null $time_exec
 * @property string|null $command
 * @property string|null $description
 * @property int|null $limit_letters
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class MailLettersLimits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_limits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['limit_letters', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['post_name', 'time_exec', 'command', 'description', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_name' => 'Post Name',
            'time_exec' => 'Time Exec',
            'command' => 'Command',
            'description' => 'Description',
            'limit_letters' => 'Limit Letters',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\MailLettersLimitsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersLimitsQuery(get_called_class());
    }
}
