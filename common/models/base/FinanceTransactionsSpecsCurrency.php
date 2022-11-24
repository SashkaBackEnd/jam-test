<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_specs_currency".
 *
 * @property int $id
 * @property int $finance_transactions_specs__id
 * @property string $currency_alias
 * @property float $amount
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsSpecsCurrency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_specs_currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions_specs__id', 'created_by', 'modified_by'], 'integer'],
            [['currency_alias'], 'required'],
            [['amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['currency_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['finance_transactions_specs__id', 'currency_alias'], 'unique', 'targetAttribute' => ['finance_transactions_specs__id', 'currency_alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'finance_transactions_specs__id' => 'Finance Transactions Specs  ID',
            'currency_alias' => 'Currency Alias',
            'amount' => 'Amount',
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
     * @return \common\models\base\query\FinanceTransactionsSpecsCurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsSpecsCurrencyQuery(get_called_class());
    }
}
