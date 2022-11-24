<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_specs_objects".
 *
 * @property int $id
 * @property int $finance_transactions_specs__id
 * @property string $alias
 * @property string|null $title
 * @property string|null $typeof
 * @property int|null $is_required
 * @property int|null $is_show_for_admin Показывать администратору
 * @property int|null $is_show_for_debit Показывать для пользователья со стороны дебет
 * @property int|null $is_show_for_credit Показывать для пользователя со стороны кредит
 * @property int|null $is_admin_specifies Данные вносит администратор
 * @property int|null $is_debit_specifies Данные вносит пользователь со стороны дебет
 * @property int|null $is_credit_specifies Данные вносит пользователь со стороны кредит
 * @property int|null $is_allowed_filter Разрешать фильтровать по объекту
 * @property string|null $class_handler Класс обработчик
 * @property string|null $method_for_filter Метод, возвращающий список для фильтра
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsSpecsObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_specs_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions_specs__id', 'is_required', 'is_show_for_admin', 'is_show_for_debit', 'is_show_for_credit', 'is_admin_specifies', 'is_debit_specifies', 'is_credit_specifies', 'is_allowed_filter', 'created_by', 'modified_by'], 'integer'],
            [['alias'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'title', 'method_for_filter', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['typeof'], 'string', 'max' => 4000],
            [['class_handler'], 'string', 'max' => 255],
            [['finance_transactions_specs__id', 'alias'], 'unique', 'targetAttribute' => ['finance_transactions_specs__id', 'alias']],
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
            'alias' => 'Alias',
            'title' => 'Title',
            'typeof' => 'Typeof',
            'is_required' => 'Is Required',
            'is_show_for_admin' => 'Is Show For Admin',
            'is_show_for_debit' => 'Is Show For Debit',
            'is_show_for_credit' => 'Is Show For Credit',
            'is_admin_specifies' => 'Is Admin Specifies',
            'is_debit_specifies' => 'Is Debit Specifies',
            'is_credit_specifies' => 'Is Credit Specifies',
            'is_allowed_filter' => 'Is Allowed Filter',
            'class_handler' => 'Class Handler',
            'method_for_filter' => 'Method For Filter',
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
     * @return \common\models\base\query\FinanceTransactionsSpecsObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsSpecsObjectsQuery(get_called_class());
    }
}
