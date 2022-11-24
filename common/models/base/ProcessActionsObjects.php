<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_actions_objects".
 *
 * @property int $id
 * @property int $process_actions__id
 * @property int $process_objects_types__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessActionsObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_actions_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_actions__id', 'process_objects_types__id'], 'required'],
            [['process_actions__id', 'process_objects_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_actions__id', 'process_objects_types__id'], 'unique', 'targetAttribute' => ['process_actions__id', 'process_objects_types__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_actions__id' => 'Process Actions  ID',
            'process_objects_types__id' => 'Process Objects Types  ID',
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
     * @return \common\models\base\query\ProcessActionsObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessActionsObjectsQuery(get_called_class());
    }
}
