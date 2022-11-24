<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_system_pay_keeper_transactions".
 *
 * @property int $id
 * @property string|null $payment_transaction__id ID операции в системе PayKeeper
 * @property int|null $finance_transactions__id ID финансовой операции
 * @property string|null $guid guid
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $payment_currency Валюта платежа
 * @property string|null $payment_url Ссылка на страницу оплаты
 * @property int $is_confirmed Статус транзакции: 0 - неподтвержденная, 1 - подтвержденная
 * @property string|null $reason Причина отклонения транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystemPayKeeperTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_system_pay_keeper_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions__id', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['payment_url'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['payment_transaction__id', 'guid', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['payment_currency'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_transaction__id' => 'Payment Transaction  ID',
            'finance_transactions__id' => 'Finance Transactions  ID',
            'guid' => 'Guid',
            'payment_amount' => 'Payment Amount',
            'payment_currency' => 'Payment Currency',
            'payment_url' => 'Payment Url',
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
     * @return \common\models\base\query\PaymentSystemPayKeeperTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemPayKeeperTransactionsQuery(get_called_class());
    }
}
