<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_bitcoin_exchange".
 *
 * @property int $id
 * @property int $transaction_id
 * @property string $currency
 * @property float $value
 * @property float $full_value Оригинальная сумма с учетом комиссии проекта
 * @property float $value_btc
 * @property float $full_value_btc Сумма с учетом комиссии проекта
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemBitcoinExchange extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_bitcoin_exchange';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_id', 'currency', 'value', 'full_value', 'value_btc', 'full_value_btc'], 'required'],
            [['transaction_id', 'created_by', 'modified_by'], 'integer'],
            [['value', 'full_value', 'value_btc', 'full_value_btc'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['currency'], 'string', 'max' => 5],
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
            'transaction_id' => 'Transaction ID',
            'currency' => 'Currency',
            'value' => 'Value',
            'full_value' => 'Full Value',
            'value_btc' => 'Value Btc',
            'full_value_btc' => 'Full Value Btc',
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
     * @return \common\models\base\query\PaymentsystemBitcoinExchangeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemBitcoinExchangeQuery(get_called_class());
    }
}
