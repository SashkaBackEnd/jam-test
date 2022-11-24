<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "admin_exchange_rate_history".
 *
 * @property int $id
 * @property int $admin_exchange_rate__id
 * @property string $action
 * @property string $currency_width С чего
 * @property string $currency_into Во что
 * @property float $rate Установленный курс
 * @property string|null $date_from
 * @property string|null $date_to
 * @property int $is_used Используется ли курс в данный момент
 * @property int|null $is_active
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AdminExchangeRateHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_exchange_rate_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_exchange_rate__id', 'action', 'currency_width', 'currency_into', 'rate'], 'required'],
            [['admin_exchange_rate__id', 'is_used', 'is_active', 'created_by', 'modified_by'], 'integer'],
            [['rate'], 'number'],
            [['date_from', 'date_to', 'created_at', 'modified_at'], 'safe'],
            [['action'], 'string', 'max' => 20],
            [['currency_width', 'currency_into', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_exchange_rate__id' => 'Admin Exchange Rate  ID',
            'action' => 'Action',
            'currency_width' => 'Currency Width',
            'currency_into' => 'Currency Into',
            'rate' => 'Rate',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'is_used' => 'Is Used',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\AdminExchangeRateHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AdminExchangeRateHistoryQuery(get_called_class());
    }
}
