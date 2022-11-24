<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_status_history".
 *
 * @property int $id
 * @property int $users__id
 * @property string $status_old
 * @property string $status_new
 * @property int $profile_delete_reasons__id
 * @property string $reason_text
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileStatusHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_status_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'status_old', 'status_new', 'profile_delete_reasons__id', 'reason_text'], 'required'],
            [['users__id', 'profile_delete_reasons__id', 'created_by', 'modified_by'], 'integer'],
            [['reason_text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['status_old', 'status_new', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'status_old' => 'Status Old',
            'status_new' => 'Status New',
            'profile_delete_reasons__id' => 'Profile Delete Reasons  ID',
            'reason_text' => 'Reason Text',
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
     * @return \common\models\base\query\ProfileStatusHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileStatusHistoryQuery(get_called_class());
    }
}
