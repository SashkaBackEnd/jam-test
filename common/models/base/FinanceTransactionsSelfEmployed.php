<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_self_employed".
 *
 * @property int $id
 * @property int $status
 * @property string|null $message
 * @property int|null $attach_id
 * @property int|null $last_attach_id
 * @property int $finance_transactions__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FinanceTransactionsSelfEmployed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_self_employed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'attach_id', 'last_attach_id', 'finance_transactions__id', 'created_by', 'modified_by'], 'integer'],
            [['message'], 'string'],
            [['finance_transactions__id'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['finance_transactions__id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'message' => 'Message',
            'attach_id' => 'Attach ID',
            'last_attach_id' => 'Last Attach ID',
            'finance_transactions__id' => 'Finance Transactions  ID',
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
     * @return \common\models\base\query\FinanceTransactionsSelfEmployedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsSelfEmployedQuery(get_called_class());
    }
}
