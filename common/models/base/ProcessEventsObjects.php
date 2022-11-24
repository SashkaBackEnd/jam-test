<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_events_objects".
 *
 * @property int $id
 * @property int $process_events__id
 * @property int $process_objects_types__id
 * @property string $alias
 * @property int|null $is_required
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessEventsObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_events_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_events__id', 'process_objects_types__id', 'alias'], 'required'],
            [['process_events__id', 'process_objects_types__id', 'is_required', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_events__id', 'alias'], 'unique', 'targetAttribute' => ['process_events__id', 'alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_events__id' => 'Process Events  ID',
            'process_objects_types__id' => 'Process Objects Types  ID',
            'alias' => 'Alias',
            'is_required' => 'Is Required',
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
     * @return \common\models\base\query\ProcessEventsObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessEventsObjectsQuery(get_called_class());
    }
}
