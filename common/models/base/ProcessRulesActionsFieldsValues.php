<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_rules_actions_fields_values".
 *
 * @property int $id
 * @property int $process_rules_actions__id
 * @property int $process_actions_fields__id
 * @property string|null $comparison_operator Оператор сравнения для значений
 * @property string $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessRulesActionsFieldsValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_rules_actions_fields_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_rules_actions__id', 'process_actions_fields__id', 'value'], 'required'],
            [['process_rules_actions__id', 'process_actions_fields__id', 'created_by', 'modified_by'], 'integer'],
            [['comparison_operator'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['value'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_rules_actions__id', 'process_actions_fields__id'], 'unique', 'targetAttribute' => ['process_rules_actions__id', 'process_actions_fields__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_rules_actions__id' => 'Process Rules Actions  ID',
            'process_actions_fields__id' => 'Process Actions Fields  ID',
            'comparison_operator' => 'Comparison Operator',
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
     * @return \common\models\base\query\ProcessRulesActionsFieldsValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessRulesActionsFieldsValuesQuery(get_called_class());
    }
}
