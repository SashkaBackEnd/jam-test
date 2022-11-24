<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_systems_exchange_rate".
 *
 * @property int $id
 * @property string|null $currency_width С чего
 * @property string|null $currency_into Во что
 * @property float|null $rate_shop_pay
 * @property float|null $rate
 * @property float|null $rate_out Курс при выводе из проекта
 * @property int|null $is_rate_out_in_use Показывать ли курс для покупки в админке
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystemsExchangeRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_systems_exchange_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate_shop_pay', 'rate', 'rate_out'], 'number'],
            [['is_rate_out_in_use', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
            'currency_width' => 'Currency Width',
            'currency_into' => 'Currency Into',
            'rate_shop_pay' => 'Rate Shop Pay',
            'rate' => 'Rate',
            'rate_out' => 'Rate Out',
            'is_rate_out_in_use' => 'Is Rate Out In Use',
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
     * @return \common\models\base\query\PaymentSystemsExchangeRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemsExchangeRateQuery(get_called_class());
    }
}
