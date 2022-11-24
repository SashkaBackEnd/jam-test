<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_paykassa_transactions".
 *
 * @property int $id
 * @property string|null $payee_account Аккаунт мерчанта в системе Paykassa
 * @property int|null $payment_id ID финансовой операции
 * @property string|null $guid guid
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $payment_units Валюта платежа
 * @property string|null $payment_batch_num Идентификатор платежа в системе Paykassa
 * @property string|null $payer_payment Платёжная система, которую выбрал плательщик в системе Paykassa
 * @property string|null $timestampgmt Временная метка даты транзакции в системе Paykassa
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
class PaymentsystemPaykassaTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_paykassa_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['payee_account', 'payment_units', 'payer_payment'], 'string', 'max' => 20],
            [['guid', 'hash', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['payment_batch_num', 'timestampgmt'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payee_account' => 'Payee Account',
            'payment_id' => 'Payment ID',
            'guid' => 'Guid',
            'payment_amount' => 'Payment Amount',
            'payment_units' => 'Payment Units',
            'payment_batch_num' => 'Payment Batch Num',
            'payer_payment' => 'Payer Payment',
            'timestampgmt' => 'Timestampgmt',
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
     * @return \common\models\base\query\PaymentsystemPaykassaTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemPaykassaTransactionsQuery(get_called_class());
    }
}
