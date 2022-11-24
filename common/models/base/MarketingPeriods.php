<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_periods".
 *
 * @property int $id
 * @property string $marketing_periods_types__alias Псевдоним
 * @property string|null $date_from
 * @property string|null $date_to
 * @property int $duration_seconds Длительность экземпляра периода в секундах, закеширована для ускоренной отработки сортировки периодов при их закрытии.
 * @property string $status_alias Статус
 * @property float $turnover Оборот компании
 * @property int $is_pay
 * @property string|null $pay_date
 * @property float $pay_amount
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPeriods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_periods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marketing_periods_types__alias', 'duration_seconds'], 'required'],
            [['date_from', 'date_to', 'pay_date', 'created_at', 'modified_at'], 'safe'],
            [['duration_seconds', 'is_pay', 'created_by', 'modified_by'], 'integer'],
            [['status_alias'], 'string'],
            [['turnover', 'pay_amount'], 'number'],
            [['marketing_periods_types__alias'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['marketing_periods_types__alias', 'date_from', 'date_to'], 'unique', 'targetAttribute' => ['marketing_periods_types__alias', 'date_from', 'date_to']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketing_periods_types__alias' => 'Marketing Periods Types  Alias',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'duration_seconds' => 'Duration Seconds',
            'status_alias' => 'Status Alias',
            'turnover' => 'Turnover',
            'is_pay' => 'Is Pay',
            'pay_date' => 'Pay Date',
            'pay_amount' => 'Pay Amount',
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
     * @return \common\models\base\query\MarketingPeriodsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPeriodsQuery(get_called_class());
    }
}
