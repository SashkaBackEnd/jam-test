<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_periods_tasks_values".
 *
 * @property int $id
 * @property int $marketing_periods_tasks__id
 * @property string $name
 * @property string $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPeriodsTasksValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_periods_tasks_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marketing_periods_tasks__id', 'name', 'value'], 'required'],
            [['marketing_periods_tasks__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['value', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['marketing_periods_tasks__id', 'name'], 'unique', 'targetAttribute' => ['marketing_periods_tasks__id', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketing_periods_tasks__id' => 'Marketing Periods Tasks  ID',
            'name' => 'Name',
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
     * @return \common\models\base\query\MarketingPeriodsTasksValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPeriodsTasksValuesQuery(get_called_class());
    }
}
