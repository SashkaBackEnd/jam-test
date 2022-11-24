<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "getcourse_sync_errors".
 *
 * @property int $id
 * @property int|null $sync__id
 * @property string|null $message
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class GetcourseSyncErrors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'getcourse_sync_errors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sync__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['message'], 'string', 'max' => 1000],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sync__id' => 'Sync  ID',
            'message' => 'Message',
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
     * @return \common\models\base\query\GetcourseSyncErrorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\GetcourseSyncErrorsQuery(get_called_class());
    }
}
