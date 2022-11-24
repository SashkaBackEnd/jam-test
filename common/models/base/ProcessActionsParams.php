<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_actions_params".
 *
 * @property int $id
 * @property int $process_actions__id
 * @property string $alias Псевдоним параметра
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessActionsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_actions_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_actions__id', 'alias'], 'required'],
            [['process_actions__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_actions__id', 'alias'], 'unique', 'targetAttribute' => ['process_actions__id', 'alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_actions__id' => 'Process Actions  ID',
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
     * @return \common\models\base\query\ProcessActionsParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessActionsParamsQuery(get_called_class());
    }
}
