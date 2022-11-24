<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_specs_groups".
 *
 * @property int $id
 * @property int $finance_transactions_specs__id Идентификатор спецификации финансовой операции
 * @property string $finance_transactions_groups__alias Псевдоним группы финансовой операции
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsSpecsGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_specs_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions_specs__id', 'finance_transactions_groups__alias'], 'required'],
            [['finance_transactions_specs__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['finance_transactions_groups__alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'finance_transactions_groups__alias' => 'Finance Transactions Groups  Alias',
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
     * @return \common\models\base\query\FinanceTransactionsSpecsGroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsSpecsGroupsQuery(get_called_class());
    }
}
