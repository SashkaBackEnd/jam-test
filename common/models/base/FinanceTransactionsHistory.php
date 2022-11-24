<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_history".
 *
 * @property int $id
 * @property int $finance_transactions__id
 * @property string $status_alias ID статуса операции
 * @property string|null $comment
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions__id', 'status_alias'], 'required'],
            [['finance_transactions__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['status_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['comment'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'finance_transactions__id' => 'Finance Transactions  ID',
            'status_alias' => 'Status Alias',
            'comment' => 'Comment',
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
     * @return \common\models\base\query\FinanceTransactionsHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsHistoryQuery(get_called_class());
    }
}
