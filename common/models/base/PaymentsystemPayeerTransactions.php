<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_payeer_transactions".
 *
 * @property int $id
 * @property string|null $payee_account идентификатор магазина в системе Payeer
 * @property string|null $payment_id GUID финоперации
 * @property float|null $payment_amount сумма платежа
 * @property string|null $payment_units валюта платежа
 * @property string|null $payment_payeer_num идентификатор платежа в системе Payeer
 * @property string|null $payment_via_ps платежная система, через которую пользователь оплатил счет
 * @property string|null $date_create_operation Дата и время формирования операции в системе Payeer
 * @property string|null $date_exec_operation Дата и время выполнения платежа в системе Payeer
 * @property string|null $signature цифровая подпись
 * @property string|null $payment_status Статус платежа проведенного в системе «Payeer». success or fail
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
class PaymentsystemPayeerTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_payeer_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_amount'], 'number'],
            [['is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['payee_account', 'payment_units'], 'string', 'max' => 20],
            [['payment_id'], 'string', 'max' => 32],
            [['payment_payeer_num', 'payment_status'], 'string', 'max' => 50],
            [['payment_via_ps', 'signature'], 'string', 'max' => 255],
            [['date_create_operation', 'date_exec_operation', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'payment_amount' => 'Payment Amount',
            'payment_units' => 'Payment Units',
            'payment_payeer_num' => 'Payment Payeer Num',
            'payment_via_ps' => 'Payment Via Ps',
            'date_create_operation' => 'Date Create Operation',
            'date_exec_operation' => 'Date Exec Operation',
            'signature' => 'Signature',
            'payment_status' => 'Payment Status',
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
     * @return \common\models\base\query\PaymentsystemPayeerTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemPayeerTransactionsQuery(get_called_class());
    }
}
