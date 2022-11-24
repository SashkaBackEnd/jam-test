<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_objects_types_attributes".
 *
 * @property int $id
 * @property int $process_objects_types__id
 * @property string $attribute Атрибут объекта
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessObjectsTypesAttributes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_objects_types_attributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_objects_types__id', 'attribute'], 'required'],
            [['process_objects_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['attribute'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_objects_types__id', 'attribute'], 'unique', 'targetAttribute' => ['process_objects_types__id', 'attribute']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_objects_types__id' => 'Process Objects Types  ID',
            'attribute' => 'Attribute',
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
     * @return \common\models\base\query\ProcessObjectsTypesAttributesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessObjectsTypesAttributesQuery(get_called_class());
    }
}
