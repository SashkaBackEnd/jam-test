<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payments_system_paypal_transaction".
 *
 * @property int $id
 * @property string|null $item_name
 * @property int|null $item_number
 * @property string|null $payment_status
 * @property float|null $payment_amount
 * @property string|null $payment_currency
 * @property string|null $txn_id
 * @property string|null $txn_type
 * @property string|null $receiver_email
 * @property string|null $payer_email
 * @property int|null $transaction__id
 * @property string|null $post_all
 * @property int|null $is_real
 * @property int|null $is_confirmed
 * @property string|null $reason
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsSystemPaypalTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments_system_paypal_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_number', 'transaction__id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['payment_amount'], 'number'],
            [['post_all', 'reason'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['item_name'], 'string', 'max' => 500],
            [['payment_status', 'txn_id'], 'string', 'max' => 50],
            [['payment_currency'], 'string', 'max' => 10],
            [['txn_type'], 'string', 'max' => 255],
            [['receiver_email', 'payer_email', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'Item Name',
            'item_number' => 'Item Number',
            'payment_status' => 'Payment Status',
            'payment_amount' => 'Payment Amount',
            'payment_currency' => 'Payment Currency',
            'txn_id' => 'Txn ID',
            'txn_type' => 'Txn Type',
            'receiver_email' => 'Receiver Email',
            'payer_email' => 'Payer Email',
            'transaction__id' => 'Transaction  ID',
            'post_all' => 'Post All',
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
     * @return \common\models\base\query\PaymentsSystemPaypalTransactionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsSystemPaypalTransactionQuery(get_called_class());
    }
}
