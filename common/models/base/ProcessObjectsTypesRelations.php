<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_objects_types_relations".
 *
 * @property int $id
 * @property string $process_objects_types_alias Псевдоним типа объекта (process_objects_alias)
 * @property string $alias Псевдоним связанного объекта
 * @property string $process_objects_types_alias_related Псевдоним типа связанного объекта (process_objects_alias)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessObjectsTypesRelations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_objects_types_relations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_objects_types_alias', 'alias', 'process_objects_types_alias_related'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['process_objects_types_alias', 'alias', 'process_objects_types_alias_related'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_objects_types_alias', 'alias'], 'unique', 'targetAttribute' => ['process_objects_types_alias', 'alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_objects_types_alias' => 'Process Objects Types Alias',
            'alias' => 'Alias',
            'process_objects_types_alias_related' => 'Process Objects Types Alias Related',
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
     * @return \common\models\base\query\ProcessObjectsTypesRelationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessObjectsTypesRelationsQuery(get_called_class());
    }
}
