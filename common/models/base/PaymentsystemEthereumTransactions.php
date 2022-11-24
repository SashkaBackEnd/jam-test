<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_ethereum_transactions".
 *
 * @property int $id
 * @property string|null $wallet_address Исходящий адрес платежа
 * @property string|null $wallet_in_address Адрес кошелька, на который произведен перевод
 * @property string|null $transaction_hash Хеш транзакции
 * @property string|null $ethereum_sum Сумма в эфирах
 * @property int|null $finance_transaction_id ID Финансовой операции
 * @property string|null $exchange_rate Зафиксированный курс
 * @property int $emulation Эмуляция
 * @property int $confirmations
 * @property string $block_number
 * @property int|null $from_finance_transaction_id В случае преоткрытия операции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemEthereumTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_ethereum_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transaction_id', 'emulation', 'confirmations', 'from_finance_transaction_id', 'created_by', 'modified_by'], 'integer'],
            [['block_number'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['wallet_address', 'wallet_in_address', 'transaction_hash', 'ethereum_sum', 'exchange_rate', 'block_number'], 'string', 'max' => 255],
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
            'ethereum_sum' => 'Ethereum Sum',
            'finance_transaction_id' => 'Finance Transaction ID',
            'exchange_rate' => 'Exchange Rate',
            'emulation' => 'Emulation',
            'confirmations' => 'Confirmations',
            'block_number' => 'Block Number',
            'from_finance_transaction_id' => 'From Finance Transaction ID',
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
     * @return \common\models\base\query\PaymentsystemEthereumTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemEthereumTransactionsQuery(get_called_class());
    }
}
