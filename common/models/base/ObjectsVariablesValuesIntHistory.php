<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "objects_variables_values_int_history".
 *
 * @property int $id
 * @property int $objects_variables_values_int__id
 * @property int $value
 * @property int|null $value_delta
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ObjectsVariablesValuesIntHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects_variables_values_int_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objects_variables_values_int__id', 'value'], 'required'],
            [['objects_variables_values_int__id', 'value', 'value_delta', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
            'objects_variables_values_int__id' => 'Objects Variables Values Int  ID',
            'value' => 'Value',
            'value_delta' => 'Value Delta',
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
     * @return \common\models\base\query\ObjectsVariablesValuesIntHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ObjectsVariablesValuesIntHistoryQuery(get_called_class());
    }
}
