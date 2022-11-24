<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_webmoney_transactions".
 *
 * @property int $id
 * @property int|null $payment_no В этом поле передается номер покупки в соответствии с системой учета продавца (ID)
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $sys_invs_no Номер счета в системе WebMoney Transfer
 * @property string|null $sys_trans_no Номер платежа в системе WebMoney Transfer
 * @property string|null $sys_trans_date Дата и время реального прохождения платежа в системе WebMoney Transfer в формате "YYYYMMDD HH:MM:SS"
 * @property string|null $payee_purse Кошелек продавца, на который покупатель совершил платеж.
 * @property string|null $payer_purse Кошелек, с которого покупатель совершил платеж.
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
class PaymentsystemWebmoneyTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_webmoney_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_no', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['sys_trans_date', 'created_at', 'modified_at'], 'safe'],
            [['sys_invs_no', 'sys_trans_no'], 'string', 'max' => 50],
            [['payee_purse', 'payer_purse'], 'string', 'max' => 20],
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
            'payment_no' => 'Payment No',
            'payment_amount' => 'Payment Amount',
            'sys_invs_no' => 'Sys Invs No',
            'sys_trans_no' => 'Sys Trans No',
            'sys_trans_date' => 'Sys Trans Date',
            'payee_purse' => 'Payee Purse',
            'payer_purse' => 'Payer Purse',
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
     * @return \common\models\base\query\PaymentsystemWebmoneyTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemWebmoneyTransactionsQuery(get_called_class());
    }
}
