<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_alienpay_transactions".
 *
 * @property int $id
 * @property string|null $transaction_id GUID финоперации
 * @property string|null $gateway_name
 * @property int $payment_id ID платежа в системе AlienPay
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $payment_currency Валюта платежа
 * @property string|null $sign Сигнатура
 * @property int $is_real Реальный платеж: 0 - платеж через эмуляцию, 1 - реальный платеж
 * @property int $is_confirmed Статус транзакции: 0 - неподтвержденная, 1 - подтвержденная
 * @property string|null $reason Причина отклонения/подтверждения транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemAlienpayTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_alienpay_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id'], 'required'],
            [['payment_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['transaction_id', 'gateway_name'], 'string', 'max' => 255],
            [['payment_currency'], 'string', 'max' => 20],
            [['sign', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'gateway_name' => 'Gateway Name',
            'payment_id' => 'Payment ID',
            'payment_amount' => 'Payment Amount',
            'payment_currency' => 'Payment Currency',
            'sign' => 'Sign',
            'is_real' => 'Is Real',
            'is_confirmed' => 'Is Confirmed',
            'reason' => 'Reason',
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
     * @return \common\models\base\query\PaymentsystemAlienpayTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemAlienpayTransactionsQuery(get_called_class());
    }
}
