<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "objects_variables_values_decimal_history".
 *
 * @property int $id
 * @property int $objects_variables_values_decimal__id
 * @property float $value
 * @property float|null $value_delta
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ObjectsVariablesValuesDecimalHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects_variables_values_decimal_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objects_variables_values_decimal__id', 'value'], 'required'],
            [['objects_variables_values_decimal__id', 'created_by', 'modified_by'], 'integer'],
            [['value', 'value_delta'], 'number'],
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
            'objects_variables_values_decimal__id' => 'Objects Variables Values Decimal  ID',
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
     * @return \common\models\base\query\ObjectsVariablesValuesDecimalHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ObjectsVariablesValuesDecimalHistoryQuery(get_called_class());
    }
}
