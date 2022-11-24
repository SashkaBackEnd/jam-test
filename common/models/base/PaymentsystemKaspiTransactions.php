<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_kaspi_transactions".
 *
 * @property int $id
 * @property string|null $command Команда - точка входа
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $payment_units Валюта платежа
 * @property int|null $transaction_id Внутренний идентификатор платежа
 * @property int|null $bank_transaction_id Идентификатор платежа в системе Kaspi
 * @property string|null $payee_account Номер кошелька в системе Kaspi
 * @property string|null $timestamp_gmt Временная метка даты транзакции в системе Kaspi
 * @property int $is_real Реальный платеж: 0 - платеж через эмуляцию, 1 - реальный платеж
 * @property int $result Код состояния/ошибки
 * @property int $is_confirmed Статус транзакции: 0 - неподтвержденная, 1 - подтвержденная
 * @property string|null $reason Причина отклонения/подтверждения транзакции
 * @property string|null $sign Сигнатура
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemKaspiTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_kaspi_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_amount'], 'number'],
            [['transaction_id', 'bank_transaction_id', 'is_real', 'result', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['reason', 'sign'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['command', 'payment_units', 'payee_account'], 'string', 'max' => 30],
            [['timestamp_gmt'], 'string', 'max' => 50],
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
            'command' => 'Command',
            'payment_amount' => 'Payment Amount',
            'payment_units' => 'Payment Units',
            'transaction_id' => 'Transaction ID',
            'bank_transaction_id' => 'Bank Transaction ID',
            'payee_account' => 'Payee Account',
            'timestamp_gmt' => 'Timestamp Gmt',
            'is_real' => 'Is Real',
            'result' => 'Result',
            'is_confirmed' => 'Is Confirmed',
            'reason' => 'Reason',
            'sign' => 'Sign',
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
     * @return \common\models\base\query\PaymentsystemKaspiTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemKaspiTransactionsQuery(get_called_class());
    }
}
