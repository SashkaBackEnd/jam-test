<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_type_action_condition_param_value".
 *
 * @property int $id
 * @property int|null $matrix_types__id
 * @property int|null $matrix_type_actions__id
 * @property int|null $matrix_type_action_conditions__id
 * @property int|null $matrix_conditions__id
 * @property int|null $matrix_params__id
 * @property string $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypeActionConditionParamValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_type_action_condition_param_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_types__id', 'matrix_type_actions__id', 'matrix_type_action_conditions__id', 'matrix_conditions__id', 'matrix_params__id', 'created_by', 'modified_by'], 'integer'],
            [['value'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['value'], 'string', 'max' => 1000],
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
            'matrix_types__id' => 'Matrix Types  ID',
            'matrix_type_actions__id' => 'Matrix Type Actions  ID',
            'matrix_type_action_conditions__id' => 'Matrix Type Action Conditions  ID',
            'matrix_conditions__id' => 'Matrix Conditions  ID',
            'matrix_params__id' => 'Matrix Params  ID',
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
     * @return \common\models\base\query\MatrixTypeActionConditionParamValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypeActionConditionParamValueQuery(get_called_class());
    }
}
