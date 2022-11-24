<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_yandexmoney_transactions".
 *
 * @property int $id
 * @property string|null $requestDatetime
 * @property string|null $orderNumber
 * @property string|null $action
 * @property string|null $md5
 * @property int|null $shopId
 * @property int|null $shopArticleId
 * @property int|null $invoiceId
 * @property int|null $customerNumber
 * @property string|null $orderCreatedDatetime
 * @property float|null $orderSumAmount
 * @property string|null $orderSumCurrencyPaycash
 * @property string|null $orderSumBankPaycash
 * @property float|null $shopSumAmount
 * @property string|null $shopSumCurrencyPaycash
 * @property string|null $shopSumBankPaycash
 * @property string|null $paymentPayerCode
 * @property string|null $paymentType
 * @property string|null $MyField
 * @property int|null $check
 * @property string|null $requestDatetimeAviso
 * @property string|null $cps_user_country_code
 * @property string|null $aviso
 * @property string|null $notification_type
 * @property string|null $operation_id
 * @property float|null $amount
 * @property float|null $withdraw_amount
 * @property string|null $currency
 * @property string|null $datetime
 * @property string|null $sender
 * @property string|null $codepro
 * @property string|null $label
 * @property string|null $sha1_hash
 * @property string|null $is_confirmed
 * @property string|null $reason
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemYandexmoneyTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_yandexmoney_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shopId', 'shopArticleId', 'invoiceId', 'customerNumber', 'check', 'created_by', 'modified_by'], 'integer'],
            [['orderSumAmount', 'shopSumAmount', 'amount', 'withdraw_amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['requestDatetime', 'orderNumber', 'action', 'md5', 'orderCreatedDatetime', 'orderSumCurrencyPaycash', 'orderSumBankPaycash', 'shopSumCurrencyPaycash', 'shopSumBankPaycash', 'paymentPayerCode', 'paymentType', 'MyField', 'requestDatetimeAviso', 'cps_user_country_code', 'aviso', 'notification_type', 'operation_id', 'currency', 'datetime', 'sender', 'codepro', 'label', 'sha1_hash', 'is_confirmed', 'reason'], 'string', 'max' => 255],
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
            'requestDatetime' => 'Request Datetime',
            'orderNumber' => 'Order Number',
            'action' => 'Action',
            'md5' => 'Md5',
            'shopId' => 'Shop ID',
            'shopArticleId' => 'Shop Article ID',
            'invoiceId' => 'Invoice ID',
            'customerNumber' => 'Customer Number',
            'orderCreatedDatetime' => 'Order Created Datetime',
            'orderSumAmount' => 'Order Sum Amount',
            'orderSumCurrencyPaycash' => 'Order Sum Currency Paycash',
            'orderSumBankPaycash' => 'Order Sum Bank Paycash',
            'shopSumAmount' => 'Shop Sum Amount',
            'shopSumCurrencyPaycash' => 'Shop Sum Currency Paycash',
            'shopSumBankPaycash' => 'Shop Sum Bank Paycash',
            'paymentPayerCode' => 'Payment Payer Code',
            'paymentType' => 'Payment Type',
            'MyField' => 'My Field',
            'check' => 'Check',
            'requestDatetimeAviso' => 'Request Datetime Aviso',
            'cps_user_country_code' => 'Cps User Country Code',
            'aviso' => 'Aviso',
            'notification_type' => 'Notification Type',
            'operation_id' => 'Operation ID',
            'amount' => 'Amount',
            'withdraw_amount' => 'Withdraw Amount',
            'currency' => 'Currency',
            'datetime' => 'Datetime',
            'sender' => 'Sender',
            'codepro' => 'Codepro',
            'label' => 'Label',
            'sha1_hash' => 'Sha1 Hash',
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
     * @return \common\models\base\query\PaymentsystemYandexmoneyTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemYandexmoneyTransactionsQuery(get_called_class());
    }
}
