<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_indigo24_transactions".
 *
 * @property int $id
 * @property int|null $order_id ID финансовой операции
 * @property float|null $amount Сумма платежа
 * @property string|null $status Статус операции
 * @property string|null $body Тело ответа
 * @property string|null $signature Сигнатура ответа
 * @property int $is_real Реальный платеж: 0 - платеж через эмуляцию, 1 - реальный платеж
 * @property int $is_confirmed Статус транзакции: 0 - неподтвержденная, 1 - подтвержденная
 * @property string|null $reason Причина отклонения/подтверждения транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 *
 * @property FinanceTransactions $order
 */
class PaymentsystemIndigo24Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_indigo24_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['amount'], 'number'],
            [['body'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['status'], 'string', 'max' => 20],
            [['signature', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => FinanceTransactions::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'amount' => 'Amount',
            'status' => 'Status',
            'body' => 'Body',
            'signature' => 'Signature',
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
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\FinanceTransactionsQuery
     */
    public function getOrder()
    {
        return $this->hasOne(FinanceTransactions::className(), ['id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\PaymentsystemIndigo24TransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemIndigo24TransactionsQuery(get_called_class());
    }
}
