<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_advcash_transactions".
 *
 * @property int $id
 * @property string|null $ac_src_wallet
 * @property string|null $ac_dest_wallet
 * @property float|null $ac_amount
 * @property float|null $ac_merchant_amount
 * @property string|null $ac_merchant_currency
 * @property float|null $ac_fee
 * @property float|null $ac_buyer_amount_without_commission
 * @property float|null $ac_buyer_amount_with_commission
 * @property string|null $ac_buyer_currency
 * @property string|null $ac_transfer
 * @property string|null $ac_sci_name
 * @property string|null $ac_start_date
 * @property string|null $ac_order_id
 * @property string|null $ac_ps
 * @property string|null $ac_transaction_status
 * @property string|null $ac_buyer_email
 * @property string|null $ac_buyer_verified
 * @property string|null $ac_comments
 * @property string|null $ac_hash
 * @property int|null $is_real
 * @property int|null $is_confirmed
 * @property string|null $reason Причина отклонения/подтверждения транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemAdvcashTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_advcash_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ac_amount', 'ac_merchant_amount', 'ac_fee', 'ac_buyer_amount_without_commission', 'ac_buyer_amount_with_commission'], 'number'],
            [['is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['ac_src_wallet', 'ac_dest_wallet'], 'string', 'max' => 24],
            [['ac_merchant_currency', 'ac_buyer_currency'], 'string', 'max' => 10],
            [['ac_transfer', 'ac_sci_name'], 'string', 'max' => 255],
            [['ac_start_date', 'ac_ps', 'ac_transaction_status', 'ac_buyer_email', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['ac_order_id'], 'string', 'max' => 256],
            [['ac_buyer_verified'], 'string', 'max' => 20],
            [['ac_comments'], 'string', 'max' => 3000],
            [['ac_hash'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ac_src_wallet' => 'Ac Src Wallet',
            'ac_dest_wallet' => 'Ac Dest Wallet',
            'ac_amount' => 'Ac Amount',
            'ac_merchant_amount' => 'Ac Merchant Amount',
            'ac_merchant_currency' => 'Ac Merchant Currency',
            'ac_fee' => 'Ac Fee',
            'ac_buyer_amount_without_commission' => 'Ac Buyer Amount Without Commission',
            'ac_buyer_amount_with_commission' => 'Ac Buyer Amount With Commission',
            'ac_buyer_currency' => 'Ac Buyer Currency',
            'ac_transfer' => 'Ac Transfer',
            'ac_sci_name' => 'Ac Sci Name',
            'ac_start_date' => 'Ac Start Date',
            'ac_order_id' => 'Ac Order ID',
            'ac_ps' => 'Ac Ps',
            'ac_transaction_status' => 'Ac Transaction Status',
            'ac_buyer_email' => 'Ac Buyer Email',
            'ac_buyer_verified' => 'Ac Buyer Verified',
            'ac_comments' => 'Ac Comments',
            'ac_hash' => 'Ac Hash',
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
     * @return \common\models\base\query\PaymentsystemAdvcashTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemAdvcashTransactionsQuery(get_called_class());
    }
}
