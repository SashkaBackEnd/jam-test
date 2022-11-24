<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "feedback_mailboxes".
 *
 * @property int $id
 * @property string $email
 * @property string $project_alias
 * @property int|null $is_active
 * @property string $created_at
 * @property int $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string|null $modified_ip
 */
class FeedbackMailboxes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_mailboxes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'project_alias', 'created_at', 'created_by', 'modified_at', 'modified_by'], 'required'],
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['email', 'project_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'project_alias' => 'Project Alias',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\FeedbackMailboxesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FeedbackMailboxesQuery(get_called_class());
    }
}
