<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_liqpay_transactions".
 *
 * @property int $id
 * @property string|null $public_key Публичный ключ - является идентификатором магазина
 * @property float $amount Сумма для списания при оплате в магазине
 * @property string|null $currency Валюта платежа. Доступны следущие валюты: USD, UAH, RUB, EUR
 * @property string|null $description Описание покупки
 * @property string|null $order_id Уникальный ID покупки в Вашем магазине (guid транзакции)
 * @property string|null $type Тип оплаты. Доступно два значения. buy - покупка в магазине, donate - пожертвование
 * @property string|null $signature Подпись запроса
 * @property string|null $status Статус платежа
 * @property int|null $transaction_id Id транзакции в системе LiqPay
 * @property string|null $sender_phone Телефон плательщика в международном формате
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
class PaymentsystemLiqpayTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_liqpay_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'required'],
            [['amount'], 'number'],
            [['transaction_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['public_key', 'order_id', 'status', 'sender_phone'], 'string', 'max' => 50],
            [['currency', 'type'], 'string', 'max' => 20],
            [['description', 'signature'], 'string', 'max' => 500],
            [['reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'public_key' => 'Public Key',
            'amount' => 'Amount',
            'currency' => 'Currency',
            'description' => 'Description',
            'order_id' => 'Order ID',
            'type' => 'Type',
            'signature' => 'Signature',
            'status' => 'Status',
            'transaction_id' => 'Transaction ID',
            'sender_phone' => 'Sender Phone',
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
     * @return \common\models\base\query\PaymentsystemLiqpayTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemLiqpayTransactionsQuery(get_called_class());
    }
}
