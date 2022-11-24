<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_bitcoin_withdraw".
 *
 * @property int $id
 * @property string|null $transaction_guid Transaction guid
 * @property string|null $bi_to
 * @property int|null $bi_amount
 * @property string $bi_from
 * @property int $bi_fee
 * @property string $bi_txid
 * @property string|null $bi_tx_hash
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemBitcoinWithdraw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_bitcoin_withdraw';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bi_amount', 'bi_fee', 'created_by', 'modified_by'], 'integer'],
            [['bi_from', 'bi_fee', 'bi_txid'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['transaction_guid'], 'string', 'max' => 32],
            [['bi_to', 'bi_from', 'bi_txid', 'bi_tx_hash'], 'string', 'max' => 255],
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
            'transaction_guid' => 'Transaction Guid',
            'bi_to' => 'Bi To',
            'bi_amount' => 'Bi Amount',
            'bi_from' => 'Bi From',
            'bi_fee' => 'Bi Fee',
            'bi_txid' => 'Bi Txid',
            'bi_tx_hash' => 'Bi Tx Hash',
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
     * @return \common\models\base\query\PaymentsystemBitcoinWithdrawQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemBitcoinWithdrawQuery(get_called_class());
    }
}
