<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_paybox_transactions".
 *
 * @property int $id
 * @property string|null $pg_merchant_id Аккаунт мерчанта в системе PayBoxMoney
 * @property int|null $payment_id ID финансовой операции
 * @property float|null $payment_amount Сумма платежа
 * @property string|null $pg_currency Валюта платежа
 * @property string|null $pg_payment_id Идентификатор платежа в системе PayBoxMoney
 * @property string|null $pg_salt Соль
 * @property string|null $pg_salt_answer Соль ответа
 * @property string|null $pg_sig Сигнатура
 * @property string|null $pg_sig_answer Сигнатура ответа
 * @property string|null $raw_data
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
class PaymentsystemPayboxTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_paybox_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['raw_data'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['pg_merchant_id', 'pg_payment_id'], 'string', 'max' => 50],
            [['pg_currency'], 'string', 'max' => 20],
            [['pg_salt', 'pg_salt_answer', 'pg_sig', 'pg_sig_answer', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pg_merchant_id' => 'Pg Merchant ID',
            'payment_id' => 'Payment ID',
            'payment_amount' => 'Payment Amount',
            'pg_currency' => 'Pg Currency',
            'pg_payment_id' => 'Pg Payment ID',
            'pg_salt' => 'Pg Salt',
            'pg_salt_answer' => 'Pg Salt Answer',
            'pg_sig' => 'Pg Sig',
            'pg_sig_answer' => 'Pg Sig Answer',
            'raw_data' => 'Raw Data',
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
     * @return \common\models\base\query\PaymentsystemPayboxTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemPayboxTransactionsQuery(get_called_class());
    }
}
