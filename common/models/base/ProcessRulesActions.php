<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_rules_actions".
 *
 * @property int $id
 * @property int $process_rules__id
 * @property int $process_actions__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessRulesActions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_rules_actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_rules__id', 'process_actions__id'], 'required'],
            [['process_rules__id', 'process_actions__id', 'created_by', 'modified_by'], 'integer'],
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
            'process_actions__id' => 'Process Actions  ID',
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
     * @return \common\models\base\query\ProcessRulesActionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessRulesActionsQuery(get_called_class());
    }
}
