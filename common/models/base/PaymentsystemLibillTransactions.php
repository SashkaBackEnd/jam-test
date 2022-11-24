<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_libill_transactions".
 *
 * @property int $id
 * @property int|null $payment_transaction_id ID операции в системе Libill 
 * @property int|null $finance_transactions__id ID финансовой операции
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $payment_currency Валюта платежа
 * @property string|null $hash Сигнатура
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
class PaymentsystemLibillTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_libill_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_transaction_id', 'finance_transactions__id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['payment_currency'], 'string', 'max' => 20],
            [['hash', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_transaction_id' => 'Payment Transaction ID',
            'finance_transactions__id' => 'Finance Transactions  ID',
            'payment_amount' => 'Payment Amount',
            'payment_currency' => 'Payment Currency',
            'hash' => 'Hash',
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
     * @return \common\models\base\query\PaymentsystemLibillTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemLibillTransactionsQuery(get_called_class());
    }
}
