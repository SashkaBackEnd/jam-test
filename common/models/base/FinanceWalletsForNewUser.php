<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_wallets_for_new_user".
 *
 * @property int $id
 * @property string|null $type_alias Тип счета активный, пассивный
 * @property string|null $object_alias
 * @property string|null $purpose_alias Alias назначения кошелька
 * @property string|null $currency_alias Alias валюты
 * @property float $credit Кредит
 * @property float $credit_unapproved К поступлению в кредит
 * @property float $debit Дебит
 * @property float $debit_unapproved К поступлению в дебет
 * @property float $balance Сальдо - доступная сумма
 * @property float $balance_unapproved
 * @property float $balance_blocked
 * @property int|null $is_set_credit_balance_limit
 * @property int|null $is_set_debit_balance_limit
 * @property float $credit_balance_limit Максимальная сумма разрешенного для кредитового сальдо. Для активных счетов в положительном значении, для пассивных в отрицательном
 * @property float $debit_balance_limit Максимальная сумма разрешенного для дебетового сальдо. Для активных счетов в отрицательно значении, для пассивных в положительном
 * @property string|null $status_alias
 * @property string|null $payments_system__alias Псевдоним платежной системы
 * @property int $is_allowed_to_manage_in Возможность пополнять кошелек
 * @property int $is_allowed_to_manage_out Возможность выводить деньги с кошелька
 * @property string|null $created_at Время создания записи
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip IP веб-пользователя (users.id), который создал запись
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip IP веб-пользователя (users.id), который внес изменения
 */
class FinanceWalletsForNewUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_wallets_for_new_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['credit', 'credit_unapproved', 'debit', 'debit_unapproved', 'balance', 'balance_unapproved', 'balance_blocked', 'credit_balance_limit', 'debit_balance_limit'], 'number'],
            [['is_set_credit_balance_limit', 'is_set_debit_balance_limit', 'is_allowed_to_manage_in', 'is_allowed_to_manage_out', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['type_alias'], 'string', 'max' => 20],
            [['object_alias', 'purpose_alias', 'currency_alias', 'status_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['payments_system__alias'], 'string', 'max' => 255],
            [['currency_alias', 'purpose_alias', 'object_alias'], 'unique', 'targetAttribute' => ['currency_alias', 'purpose_alias', 'object_alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_alias' => 'Type Alias',
            'object_alias' => 'Object Alias',
            'purpose_alias' => 'Purpose Alias',
            'currency_alias' => 'Currency Alias',
            'credit' => 'Credit',
            'credit_unapproved' => 'Credit Unapproved',
            'debit' => 'Debit',
            'debit_unapproved' => 'Debit Unapproved',
            'balance' => 'Balance',
            'balance_unapproved' => 'Balance Unapproved',
            'balance_blocked' => 'Balance Blocked',
            'is_set_credit_balance_limit' => 'Is Set Credit Balance Limit',
            'is_set_debit_balance_limit' => 'Is Set Debit Balance Limit',
            'credit_balance_limit' => 'Credit Balance Limit',
            'debit_balance_limit' => 'Debit Balance Limit',
            'status_alias' => 'Status Alias',
            'payments_system__alias' => 'Payments System  Alias',
            'is_allowed_to_manage_in' => 'Is Allowed To Manage In',
            'is_allowed_to_manage_out' => 'Is Allowed To Manage Out',
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
     * @return \common\models\base\query\FinanceWalletsForNewUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceWalletsForNewUserQuery(get_called_class());
    }
}
