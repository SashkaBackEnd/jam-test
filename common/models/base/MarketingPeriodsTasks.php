<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_periods_tasks".
 *
 * @property int $id
 * @property int $marketing_periods__id
 * @property string $marketing_periods__status_alias Статус периода, после присвоения которого ставится задание
 * @property string $alias Псевдоним задания
 * @property string|null $class Класс обработчик задания
 * @property string|null $method Метод обработчик задания
 * @property string $status_alias Статус
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPeriodsTasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_periods_tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marketing_periods__id', 'marketing_periods__status_alias', 'alias'], 'required'],
            [['marketing_periods__id', 'created_by', 'modified_by'], 'integer'],
            [['status_alias'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['marketing_periods__status_alias', 'alias'], 'string', 'max' => 30],
            [['class'], 'string', 'max' => 255],
            [['method'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['marketing_periods__id', 'alias'], 'unique', 'targetAttribute' => ['marketing_periods__id', 'alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketing_periods__id' => 'Marketing Periods  ID',
            'marketing_periods__status_alias' => 'Marketing Periods  Status Alias',
            'alias' => 'Alias',
            'class' => 'Class',
            'method' => 'Method',
            'status_alias' => 'Status Alias',
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
     * @return \common\models\base\query\MarketingPeriodsTasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPeriodsTasksQuery(get_called_class());
    }
}
