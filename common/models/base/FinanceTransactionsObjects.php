<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_objects".
 *
 * @property int $id
 * @property int|null $finance_transactions__id
 * @property string|null $alias
 * @property string|null $title
 * @property string|null $value
 * @property int|null $is_required Обязательно к заполнению
 * @property int|null $is_show_for_admin Показывать администратору
 * @property int|null $is_show_for_debit Показывать для пользователья со стороны дебет
 * @property int|null $is_show_for_credit Показывать для пользователя со стороны кредит
 * @property int|null $is_admin_specifies Данные вносит администратор
 * @property int|null $is_debit_specifies Данные вносит пользователь со стороны дебет
 * @property int|null $is_credit_specifies Данные вносит пользователь со стороны кредит
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions__id', 'is_required', 'is_show_for_admin', 'is_show_for_debit', 'is_show_for_credit', 'is_admin_specifies', 'is_debit_specifies', 'is_credit_specifies', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['value'], 'string', 'max' => 4000],
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
            'alias' => 'Alias',
            'title' => 'Title',
            'value' => 'Value',
            'is_required' => 'Is Required',
            'is_show_for_admin' => 'Is Show For Admin',
            'is_show_for_debit' => 'Is Show For Debit',
            'is_show_for_credit' => 'Is Show For Credit',
            'is_admin_specifies' => 'Is Admin Specifies',
            'is_debit_specifies' => 'Is Debit Specifies',
            'is_credit_specifies' => 'Is Credit Specifies',
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
     * @return \common\models\base\query\FinanceTransactionsObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsObjectsQuery(get_called_class());
    }
}
