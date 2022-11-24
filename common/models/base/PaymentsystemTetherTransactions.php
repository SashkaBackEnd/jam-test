<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_tether_transactions".
 *
 * @property int $id
 * @property string|null $wallet_address Исходящий адрес платежа
 * @property string|null $wallet_in_address Входящий адрес платежа
 * @property string|null $transaction_hash Хеш транзакции
 * @property string|null $amount Сумма
 * @property int|null $finance_transaction_id ID Финансовой операции
 * @property string|null $exchange_rate Зафиксированный курс
 * @property int $emulation Эмуляция
 * @property string|null $block_number
 * @property int|null $confirmations
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemTetherTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_tether_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transaction_id', 'emulation', 'confirmations', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['wallet_address', 'wallet_in_address', 'transaction_hash', 'amount', 'exchange_rate', 'block_number'], 'string', 'max' => 255],
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
            'wallet_address' => 'Wallet Address',
            'wallet_in_address' => 'Wallet In Address',
            'transaction_hash' => 'Transaction Hash',
            'amount' => 'Amount',
            'finance_transaction_id' => 'Finance Transaction ID',
            'exchange_rate' => 'Exchange Rate',
            'emulation' => 'Emulation',
            'block_number' => 'Block Number',
            'confirmations' => 'Confirmations',
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
     * @return \common\models\base\query\PaymentsystemTetherTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemTetherTransactionsQuery(get_called_class());
    }
}
