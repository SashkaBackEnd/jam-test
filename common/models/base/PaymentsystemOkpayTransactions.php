<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_okpay_transactions".
 *
 * @property int $id
 * @property string|null $ok_receiver Получатель платежа
 * @property string|null $ok_receiver_wallet ID кошелька получателя платежа
 * @property string|null $ok_receiver_email Электронная почта получателя платежа
 * @property string|null $ok_receiver_phone Телефон получателя платежа
 * @property string|null $ok_receiver_id ID аккаунта получателя платежа
 * @property string|null $ok_payer_country Страна плательщика
 * @property string|null $ok_payer_city Город плательщика
 * @property string|null $ok_payer_country_code Код страны плательщика
 * @property string|null $ok_payer_address_name Название адреса плательщика
 * @property string|null $ok_payer_state Область/Край/Регион плательщика
 * @property string|null $ok_payer_street Улица, дом, квартира плательщика
 * @property string|null $ok_payer_zip Почтовый индекс плательщика
 * @property string|null $ok_payer_address_status Статус адреса плательщика
 * @property string|null $ok_payer_phone Телефон плательщика
 * @property string|null $ok_payer_first_name Имя плательщика
 * @property string|null $ok_payer_last_name Фамилия плательщика
 * @property string|null $ok_payer_business_name Название компании плательщика
 * @property string|null $ok_payer_email Электронная почта плательщика
 * @property string|null $ok_payer_id ID аккаунта плательщика
 * @property string|null $ok_payer_reputation Бизнес оценка плательщика
 * @property string|null $ok_payer_status Статус
 * @property int|null $ok_txn_id ID операции
 * @property string|null $ok_txn_kind Тип операции
 * @property int|null $ok_txn_parent_id ID родительской операции
 * @property string|null $ok_txn_payment_type Тип платежа
 * @property string|null $ok_txn_payment_method Метод платежа
 * @property float|null $ok_txn_gross Сумма гросс
 * @property float|null $ok_txn_amount Сумма операции
 * @property float|null $ok_txn_net Сумма
 * @property float|null $ok_txn_fee Комиссия
 * @property string|null $ok_txn_currency Валюта
 * @property float|null $ok_txn_exchange_rate Курс обмена
 * @property string|null $ok_txn_datetime Дата/Время
 * @property string|null $ok_txn_status Статус
 * @property float|null $ok_txn_handling Стоимость обработки
 * @property float|null $ok_txn_shipping Цена доставки
 * @property string|null $ok_txn_shipping_method Способ доставки
 * @property float|null $ok_txn_tax Налог
 * @property string|null $ok_txn_comment Комментарий
 * @property string|null $ok_invoice Инвойс
 * @property string|null $ok_charset Кодировка
 * @property int|null $ok_items_count Количество оплачиваемых транзакций
 * @property string|null $ok_item_1_name Наименование транзакции
 * @property string|null $ok_item_1_article Гуид транзакции
 * @property string|null $ok_item_1_type Тип оплаты транзакции
 * @property int|null $ok_item_1_quantity Количество транзакций
 * @property float|null $ok_item_1_gross Сумма гросс транзакции
 * @property float|null $ok_item_1_price Сумма транзакции
 * @property int|null $ok_ipn_id ID ipn
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
class PaymentsystemOkpayTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_okpay_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ok_txn_id', 'ok_txn_parent_id', 'ok_items_count', 'ok_item_1_quantity', 'ok_ipn_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['ok_txn_gross', 'ok_txn_amount', 'ok_txn_net', 'ok_txn_fee', 'ok_txn_exchange_rate', 'ok_txn_handling', 'ok_txn_shipping', 'ok_txn_tax', 'ok_item_1_gross', 'ok_item_1_price'], 'number'],
            [['ok_txn_datetime', 'created_at', 'modified_at'], 'safe'],
            [['ok_receiver', 'ok_receiver_wallet', 'ok_receiver_email', 'ok_receiver_phone', 'ok_receiver_id', 'ok_payer_country', 'ok_payer_city', 'ok_payer_address_name', 'ok_payer_state', 'ok_payer_street', 'ok_payer_zip', 'ok_payer_address_status', 'ok_payer_phone', 'ok_payer_first_name', 'ok_payer_last_name', 'ok_payer_business_name', 'ok_payer_email', 'ok_payer_id', 'ok_payer_reputation', 'ok_txn_shipping_method', 'ok_txn_comment', 'ok_invoice', 'ok_item_1_name'], 'string', 'max' => 200],
            [['ok_payer_country_code', 'ok_txn_currency'], 'string', 'max' => 10],
            [['ok_payer_status', 'ok_txn_status', 'ok_charset'], 'string', 'max' => 30],
            [['ok_txn_kind', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['ok_txn_payment_type', 'ok_txn_payment_method', 'ok_item_1_article', 'ok_item_1_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ok_receiver' => 'Ok Receiver',
            'ok_receiver_wallet' => 'Ok Receiver Wallet',
            'ok_receiver_email' => 'Ok Receiver Email',
            'ok_receiver_phone' => 'Ok Receiver Phone',
            'ok_receiver_id' => 'Ok Receiver ID',
            'ok_payer_country' => 'Ok Payer Country',
            'ok_payer_city' => 'Ok Payer City',
            'ok_payer_country_code' => 'Ok Payer Country Code',
            'ok_payer_address_name' => 'Ok Payer Address Name',
            'ok_payer_state' => 'Ok Payer State',
            'ok_payer_street' => 'Ok Payer Street',
            'ok_payer_zip' => 'Ok Payer Zip',
            'ok_payer_address_status' => 'Ok Payer Address Status',
            'ok_payer_phone' => 'Ok Payer Phone',
            'ok_payer_first_name' => 'Ok Payer First Name',
            'ok_payer_last_name' => 'Ok Payer Last Name',
            'ok_payer_business_name' => 'Ok Payer Business Name',
            'ok_payer_email' => 'Ok Payer Email',
            'ok_payer_id' => 'Ok Payer ID',
            'ok_payer_reputation' => 'Ok Payer Reputation',
            'ok_payer_status' => 'Ok Payer Status',
            'ok_txn_id' => 'Ok Txn ID',
            'ok_txn_kind' => 'Ok Txn Kind',
            'ok_txn_parent_id' => 'Ok Txn Parent ID',
            'ok_txn_payment_type' => 'Ok Txn Payment Type',
            'ok_txn_payment_method' => 'Ok Txn Payment Method',
            'ok_txn_gross' => 'Ok Txn Gross',
            'ok_txn_amount' => 'Ok Txn Amount',
            'ok_txn_net' => 'Ok Txn Net',
            'ok_txn_fee' => 'Ok Txn Fee',
            'ok_txn_currency' => 'Ok Txn Currency',
            'ok_txn_exchange_rate' => 'Ok Txn Exchange Rate',
            'ok_txn_datetime' => 'Ok Txn Datetime',
            'ok_txn_status' => 'Ok Txn Status',
            'ok_txn_handling' => 'Ok Txn Handling',
            'ok_txn_shipping' => 'Ok Txn Shipping',
            'ok_txn_shipping_method' => 'Ok Txn Shipping Method',
            'ok_txn_tax' => 'Ok Txn Tax',
            'ok_txn_comment' => 'Ok Txn Comment',
            'ok_invoice' => 'Ok Invoice',
            'ok_charset' => 'Ok Charset',
            'ok_items_count' => 'Ok Items Count',
            'ok_item_1_name' => 'Ok Item 1 Name',
            'ok_item_1_article' => 'Ok Item 1 Article',
            'ok_item_1_type' => 'Ok Item 1 Type',
            'ok_item_1_quantity' => 'Ok Item 1 Quantity',
            'ok_item_1_gross' => 'Ok Item 1 Gross',
            'ok_item_1_price' => 'Ok Item 1 Price',
            'ok_ipn_id' => 'Ok Ipn ID',
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
     * @return \common\models\base\query\PaymentsystemOkpayTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemOkpayTransactionsQuery(get_called_class());
    }
}
