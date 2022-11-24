<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_conditions_params".
 *
 * @property int $id
 * @property int $process_conditions__id
 * @property string $alias Псевдоним параметра
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessConditionsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_conditions_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_conditions__id', 'alias'], 'required'],
            [['process_conditions__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_conditions__id', 'alias'], 'unique', 'targetAttribute' => ['process_conditions__id', 'alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_conditions__id' => 'Process Conditions  ID',
            'alias' => 'Alias',
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
     * @return \common\models\base\query\ProcessConditionsParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessConditionsParamsQuery(get_called_class());
    }
}
