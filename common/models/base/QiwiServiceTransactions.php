<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "qiwi_service_transactions".
 *
 * @property int $id
 * @property int $finance_transaction_id
 * @property string $txn_id
 * @property string $account
 * @property float $amount
 * @property int $terminal_id
 * @property int $status
 * @property string $comment
 * @property string $ip
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 * @property int|null $updated_by
 * @property string|null $updated_at
 * @property string|null $updated_ip
 */
class QiwiServiceTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qiwi_service_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transaction_id', 'txn_id', 'account', 'amount', 'terminal_id', 'status', 'comment', 'ip'], 'required'],
            [['finance_transaction_id', 'terminal_id', 'status', 'created_by', 'modified_by', 'updated_by'], 'integer'],
            [['amount'], 'number'],
            [['comment'], 'string'],
            [['created_at', 'modified_at', 'updated_at'], 'safe'],
            [['txn_id'], 'string', 'max' => 30],
            [['account'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 20],
            [['created_ip', 'modified_ip', 'updated_ip'], 'string', 'max' => 100],
            [['txn_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'finance_transaction_id' => 'Finance Transaction ID',
            'txn_id' => 'Txn ID',
            'account' => 'Account',
            'amount' => 'Amount',
            'terminal_id' => 'Terminal ID',
            'status' => 'Status',
            'comment' => 'Comment',
            'ip' => 'Ip',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'updated_ip' => 'Updated Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\QiwiServiceTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\QiwiServiceTransactionsQuery(get_called_class());
    }
}
