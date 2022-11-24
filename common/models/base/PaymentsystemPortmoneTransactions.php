<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_portmone_transactions".
 *
 * @property int $id
 * @property string|null $payee_name Название компании получателя денег 
 * @property string|null $payee_code Код компании (присваивается компании системой Portmone.com) BANK
 * @property string|null $bank_name Название банка отправителя
 * @property string|null $bank_code МФО банка отправителя 
 * @property string|null $bank_account Счет банка отправителя 
 * @property string|null $bill_id Уникальный ID счета в системе Портмоне
 * @property string|null $bill_number Номер счета
 * @property string|null $bill_date Дата счета. Формат YYYY-MM-DD 
 * @property string|null $bill_period Период за который выставляется счет. Формат – MMYY 
 * @property string|null $pay_date Дата оплаты. Формат YYYY-MM-DD
 * @property float|null $pay_amount Сума оплаты. . Разделитель точка.
 * @property float|null $payed_comission Сумма комиссии, которая будет удержана банком. Из за невозможности определить как банк проведет округление всегда равна 0 PAYED
 * @property float|null $payed_debit В том числе оплата долга.  Разделитель точка. 
 * @property string|null $auth_code Код авторизации платежной карточки
 * @property string|null $status Статус
 * @property int $is_confirmed Статус транзакции: 0 - неподтвержденная, 1 - подтвержденная
 * @property string|null $reason Причина отклонения/подтверждения транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemPortmoneTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_portmone_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pay_amount', 'payed_comission', 'payed_debit'], 'number'],
            [['is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['payee_name', 'bank_name', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['payee_code', 'bill_id', 'bill_number'], 'string', 'max' => 20],
            [['bank_code', 'bill_date', 'pay_date', 'status'], 'string', 'max' => 10],
            [['bank_account'], 'string', 'max' => 30],
            [['bill_period'], 'string', 'max' => 4],
            [['auth_code'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payee_name' => 'Payee Name',
            'payee_code' => 'Payee Code',
            'bank_name' => 'Bank Name',
            'bank_code' => 'Bank Code',
            'bank_account' => 'Bank Account',
            'bill_id' => 'Bill ID',
            'bill_number' => 'Bill Number',
            'bill_date' => 'Bill Date',
            'bill_period' => 'Bill Period',
            'pay_date' => 'Pay Date',
            'pay_amount' => 'Pay Amount',
            'payed_comission' => 'Payed Comission',
            'payed_debit' => 'Payed Debit',
            'auth_code' => 'Auth Code',
            'status' => 'Status',
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
     * @return \common\models\base\query\PaymentsystemPortmoneTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemPortmoneTransactionsQuery(get_called_class());
    }
}
