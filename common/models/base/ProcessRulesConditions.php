<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_rules_conditions".
 *
 * @property int $id
 * @property int $process_rules__id
 * @property int $process_conditions__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessRulesConditions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_rules_conditions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_rules__id', 'process_conditions__id'], 'required'],
            [['process_rules__id', 'process_conditions__id', 'created_by', 'modified_by'], 'integer'],
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
            'process_rules__id' => 'Process Rules  ID',
            'process_conditions__id' => 'Process Conditions  ID',
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
     * @return \common\models\base\query\ProcessRulesConditionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessRulesConditionsQuery(get_called_class());
    }
}
