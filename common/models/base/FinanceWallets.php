<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_wallets".
 *
 * @property int $id
 * @property string|null $type_alias Тип счета: активный, пассивный
 * @property string|null $object_alias Alias объекта-владельца кошелька
 * @property int $object_id ID объекта-владельца кошелька
 * @property string|null $purpose_alias Alias целевого назначения кошелька
 * @property string $currency_alias Alias валюты кошелька
 * @property float $debit Все поступления на кошелек
 * @property float $credit Все списывания с кошелька
 * @property float $debit_unapproved Сумма, блокированная к выводу
 * @property float $credit_unapproved Сумма, блокированная к вводу
 * @property float $balance Сальдо - доступная сумма
 * @property float $balance_unapproved
 * @property float $balance_blocked
 * @property int $is_set_debit_balance_limit
 * @property int $is_set_credit_balance_limit
 * @property float $debit_balance_limit Максимальная сумма разрешенного для дебетового сальдо. Для активных счетов в отрицательно значении, для пассивных в положительном
 * @property float $credit_balance_limit Максимальная сумма разрешенного для кредитового сальдо. Для активных счетов в положительном значении, для пассивных в отрицательном
 * @property string|null $status_alias Статус состояния кошелька
 * @property string|null $payments_system__alias Псевдоним платежной системы
 * @property int $is_allowed_to_manage_in Возможность пополнять кошелек
 * @property int $is_allowed_to_manage_out Возможность выводить деньги с кошелька
 * @property string|null $created_at Время создания записи
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip
 */
class FinanceWallets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_wallets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_id', 'currency_alias'], 'required'],
            [['object_id', 'is_set_debit_balance_limit', 'is_set_credit_balance_limit', 'is_allowed_to_manage_in', 'is_allowed_to_manage_out', 'modified_by', 'created_by'], 'integer'],
            [['debit', 'credit', 'debit_unapproved', 'credit_unapproved', 'balance', 'balance_unapproved', 'balance_blocked', 'debit_balance_limit', 'credit_balance_limit'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['type_alias', 'object_alias', 'purpose_alias', 'currency_alias', 'status_alias', 'modified_ip', 'created_ip'], 'string', 'max' => 100],
            [['payments_system__alias'], 'string', 'max' => 255],
            [['object_alias', 'purpose_alias', 'object_id', 'currency_alias'], 'unique', 'targetAttribute' => ['object_alias', 'purpose_alias', 'object_id', 'currency_alias']],
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
            'object_id' => 'Object ID',
            'purpose_alias' => 'Purpose Alias',
            'currency_alias' => 'Currency Alias',
            'debit' => 'Debit',
            'credit' => 'Credit',
            'debit_unapproved' => 'Debit Unapproved',
            'credit_unapproved' => 'Credit Unapproved',
            'balance' => 'Balance',
            'balance_unapproved' => 'Balance Unapproved',
            'balance_blocked' => 'Balance Blocked',
            'is_set_debit_balance_limit' => 'Is Set Debit Balance Limit',
            'is_set_credit_balance_limit' => 'Is Set Credit Balance Limit',
            'debit_balance_limit' => 'Debit Balance Limit',
            'credit_balance_limit' => 'Credit Balance Limit',
            'status_alias' => 'Status Alias',
            'payments_system__alias' => 'Payments System  Alias',
            'is_allowed_to_manage_in' => 'Is Allowed To Manage In',
            'is_allowed_to_manage_out' => 'Is Allowed To Manage Out',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\FinanceWalletsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceWalletsQuery(get_called_class());
    }
}
