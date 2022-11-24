<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_bitcoin_transactions".
 *
 * @property int $id
 * @property int $transaction_id
 * @property string|null $bi_address New address given
 * @property int|null $bi_amount Satoshi (1 Satoshi = 0.00000001 BTC)
 * @property string|null $bi_transaction_hash Bitcoin operation hash
 * @property int|null $is_real
 * @property int|null $is_confirmed
 * @property string|null $reason
 * @property int $confirmations
 * @property int $from_transaction_id Если операция была закрыта, то тут сохраним id с какой транзакции перешло сюда
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemBitcoinTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_bitcoin_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_id', 'from_transaction_id'], 'required'],
            [['transaction_id', 'bi_amount', 'is_real', 'is_confirmed', 'confirmations', 'from_transaction_id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['bi_address', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['bi_transaction_hash'], 'string', 'max' => 255],
            [['reason'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_id' => 'Transaction ID',
            'bi_address' => 'Bi Address',
            'bi_amount' => 'Bi Amount',
            'bi_transaction_hash' => 'Bi Transaction Hash',
            'is_real' => 'Is Real',
            'is_confirmed' => 'Is Confirmed',
            'reason' => 'Reason',
            'confirmations' => 'Confirmations',
            'from_transaction_id' => 'From Transaction ID',
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
     * @return \common\models\base\query\PaymentsystemBitcoinTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemBitcoinTransactionsQuery(get_called_class());
    }
}
