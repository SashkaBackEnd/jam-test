<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "objects_variables_values_decimal".
 *
 * @property int $id
 * @property int $objects_variables__id
 * @property int $object__id
 * @property float $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ObjectsVariablesValuesDecimal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects_variables_values_decimal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objects_variables__id', 'object__id', 'value'], 'required'],
            [['objects_variables__id', 'object__id', 'created_by', 'modified_by'], 'integer'],
            [['value'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['objects_variables__id', 'object__id'], 'unique', 'targetAttribute' => ['objects_variables__id', 'object__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'objects_variables__id' => 'Objects Variables  ID',
            'object__id' => 'Object  ID',
            'value' => 'Value',
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
     * @return \common\models\base\query\ObjectsVariablesValuesDecimalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ObjectsVariablesValuesDecimalQuery(get_called_class());
    }
}
