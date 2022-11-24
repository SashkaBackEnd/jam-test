<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payments_system_qiwi_transaction".
 *
 * @property int $id
 * @property string $transaction__guid
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property int|null $count_iteration
 * @property int|null $status_transaction
 * @property string|null $txn_id
 * @property string|null $created_at
 * @property float|null $amount
 */
class PaymentsSystemQiwiTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments_system_qiwi_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction__guid'], 'required'],
            [['created_by', 'modified_by', 'count_iteration', 'status_transaction'], 'integer'],
            [['modified_at', 'created_at'], 'safe'],
            [['amount'], 'number'],
            [['transaction__guid', 'txn_id'], 'string', 'max' => 255],
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
            'transaction__guid' => 'Transaction  Guid',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'count_iteration' => 'Count Iteration',
            'status_transaction' => 'Status Transaction',
            'txn_id' => 'Txn ID',
            'created_at' => 'Created At',
            'amount' => 'Amount',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\PaymentsSystemQiwiTransactionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsSystemQiwiTransactionQuery(get_called_class());
    }
}
