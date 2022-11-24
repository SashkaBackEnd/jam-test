<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_walletone_transactions".
 *
 * @property int $id
 * @property string|null $merchant_id Идентификатор (номер кошелька) интернет-магазина
 * @property float|null $payment_amount Сумма заказа
 * @property int|null $currency_id Идентификатор валюты заказа (ISO 4217)
 * @property string|null $user_walletone_account Двенадцати значный номер кошелька плательщика
 * @property int|null $finance_transaction__id ID финансовой операции
 * @property string|null $object_details Гуид финансовой операции
 * @property int|null $order_id Идентификатор заказа в системе учета Единой кассы
 * @property string|null $description Описание заказа
 * @property string|null $success_url Адрес (URL), на который будет отправлен покупатель после успешной оплаты
 * @property string|null $fail_url Адрес (URL), на который будет отправлен покупатель после неуспешной оплаты
 * @property string|null $expired_date Срок истечения оплаты в западно-европейском часовом поясе (UTC+0)
 * @property string|null $create_date Дата создания заказа в западно-европейском часовом поясе (UTC+0)
 * @property string|null $update_date Дата изменения заказа в западно-европейском часовом поясе (UTC+0)
 * @property string|null $order_state Состояние оплаты заказа
 * @property string|null $signature Подпись уведомления об оплате, сформированная с использованием «секретного ключа» интернет-магазина
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
class PaymentsystemWalletoneTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_walletone_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_amount'], 'number'],
            [['currency_id', 'finance_transaction__id', 'order_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['expired_date', 'create_date', 'update_date', 'created_at', 'modified_at'], 'safe'],
            [['merchant_id', 'user_walletone_account'], 'string', 'max' => 20],
            [['object_details'], 'string', 'max' => 32],
            [['description', 'signature'], 'string', 'max' => 500],
            [['success_url', 'fail_url'], 'string', 'max' => 255],
            [['order_state', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => 'Merchant ID',
            'payment_amount' => 'Payment Amount',
            'currency_id' => 'Currency ID',
            'user_walletone_account' => 'User Walletone Account',
            'finance_transaction__id' => 'Finance Transaction  ID',
            'object_details' => 'Object Details',
            'order_id' => 'Order ID',
            'description' => 'Description',
            'success_url' => 'Success Url',
            'fail_url' => 'Fail Url',
            'expired_date' => 'Expired Date',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'order_state' => 'Order State',
            'signature' => 'Signature',
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
     * @return \common\models\base\query\PaymentsystemWalletoneTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemWalletoneTransactionsQuery(get_called_class());
    }
}
