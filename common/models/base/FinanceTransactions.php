<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions".
 *
 * @property int $id
 * @property int $need_to_confirm 1 - необходимо подтверждение
 * @property int $is_self_employed
 * @property int $parent_id
 * @property int $debit_wallet_id finance_wallets.id
 * @property string|null $debit_wallet_type_alias finance_wallets.type_alias
 * @property string|null $debit_object_alias finance_wallets.object_alias
 * @property int|null $debit_object_id finance_wallets.object_id
 * @property int $credit_wallet_id ID кошелька (wallets.id) отправителя
 * @property string|null $credit_wallet_type_alias
 * @property string|null $credit_object_alias
 * @property int|null $credit_object_id
 * @property string $currency_alias ALIAS валюты (currency.alias)
 * @property string|null $date_open Дата открытия операции
 * @property string|null $date_closed Дата проведения операции
 * @property string|null $date_decline Дата отлонения операции
 * @property float $amount Сумма операции
 * @property string $group_alias Группы операции
 * @property string $spec_alias Спецификация операции
 * @property string $status_alias Статус операции
 * @property int|null $is_confirm_system
 * @property int|null $is_confirm_debit_object Подтверждение отправителя
 * @property int|null $is_confirm_credit_object Подтверждение получателя
 * @property int|null $is_confirm_admin Подтверждение администратора
 * @property float|null $debit_wallet_credit_before Сумма операции
 * @property float|null $debit_wallet_credit_after Сумма операции
 * @property float|null $debit_wallet_debit_before Сумма операции
 * @property float|null $debit_wallet_debit_after Сумма операции
 * @property float|null $debit_wallet_balance_before
 * @property float|null $debit_wallet_balance_after
 * @property float|null $credit_wallet_credit_before Сумма операции
 * @property float|null $credit_wallet_credit_after Сумма операции
 * @property float|null $credit_wallet_debit_before Сумма операции
 * @property float|null $credit_wallet_debit_after Сумма операции
 * @property float|null $credit_wallet_balance_before
 * @property float|null $credit_wallet_balance_after
 * @property int $is_service
 * @property int $is_hide_from_user
 * @property string|null $guid
 * @property string|null $redirect_open Url куда перенаправить после открытия транзакции
 * @property string|null $redirect_confirm Url куда перенаправить после подтверждения транзакции
 * @property string|null $redirect_decline Url куда перенаправить после отклонения транзакции
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 * @property string|null $decline_comment
 *
 * @property PaymentsystemIndigo24Transactions[] $paymentsystemIndigo24Transactions
 */
class FinanceTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['need_to_confirm', 'is_self_employed', 'parent_id', 'debit_wallet_id', 'debit_object_id', 'credit_wallet_id', 'credit_object_id', 'is_confirm_system', 'is_confirm_debit_object', 'is_confirm_credit_object', 'is_confirm_admin', 'is_service', 'is_hide_from_user', 'created_by', 'modified_by'], 'integer'],
            [['parent_id', 'debit_wallet_id', 'credit_wallet_id', 'currency_alias', 'group_alias', 'spec_alias', 'status_alias'], 'required'],
            [['date_open', 'date_closed', 'date_decline', 'created_at', 'modified_at'], 'safe'],
            [['amount', 'debit_wallet_credit_before', 'debit_wallet_credit_after', 'debit_wallet_debit_before', 'debit_wallet_debit_after', 'debit_wallet_balance_before', 'debit_wallet_balance_after', 'credit_wallet_credit_before', 'credit_wallet_credit_after', 'credit_wallet_debit_before', 'credit_wallet_debit_after', 'credit_wallet_balance_before', 'credit_wallet_balance_after'], 'number'],
            [['debit_wallet_type_alias', 'debit_object_alias', 'credit_wallet_type_alias', 'credit_object_alias', 'currency_alias', 'group_alias', 'spec_alias', 'status_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['guid'], 'string', 'max' => 32],
            [['redirect_open', 'redirect_confirm', 'redirect_decline'], 'string', 'max' => 1000],
            [['decline_comment'], 'string', 'max' => 255],
            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'need_to_confirm' => 'Need To Confirm',
            'is_self_employed' => 'Is Self Employed',
            'parent_id' => 'Parent ID',
            'debit_wallet_id' => 'Debit Wallet ID',
            'debit_wallet_type_alias' => 'Debit Wallet Type Alias',
            'debit_object_alias' => 'Debit Object Alias',
            'debit_object_id' => 'Debit Object ID',
            'credit_wallet_id' => 'Credit Wallet ID',
            'credit_wallet_type_alias' => 'Credit Wallet Type Alias',
            'credit_object_alias' => 'Credit Object Alias',
            'credit_object_id' => 'Credit Object ID',
            'currency_alias' => 'Currency Alias',
            'date_open' => 'Date Open',
            'date_closed' => 'Date Closed',
            'date_decline' => 'Date Decline',
            'amount' => 'Amount',
            'group_alias' => 'Group Alias',
            'spec_alias' => 'Spec Alias',
            'status_alias' => 'Status Alias',
            'is_confirm_system' => 'Is Confirm System',
            'is_confirm_debit_object' => 'Is Confirm Debit Object',
            'is_confirm_credit_object' => 'Is Confirm Credit Object',
            'is_confirm_admin' => 'Is Confirm Admin',
            'debit_wallet_credit_before' => 'Debit Wallet Credit Before',
            'debit_wallet_credit_after' => 'Debit Wallet Credit After',
            'debit_wallet_debit_before' => 'Debit Wallet Debit Before',
            'debit_wallet_debit_after' => 'Debit Wallet Debit After',
            'debit_wallet_balance_before' => 'Debit Wallet Balance Before',
            'debit_wallet_balance_after' => 'Debit Wallet Balance After',
            'credit_wallet_credit_before' => 'Credit Wallet Credit Before',
            'credit_wallet_credit_after' => 'Credit Wallet Credit After',
            'credit_wallet_debit_before' => 'Credit Wallet Debit Before',
            'credit_wallet_debit_after' => 'Credit Wallet Debit After',
            'credit_wallet_balance_before' => 'Credit Wallet Balance Before',
            'credit_wallet_balance_after' => 'Credit Wallet Balance After',
            'is_service' => 'Is Service',
            'is_hide_from_user' => 'Is Hide From User',
            'guid' => 'Guid',
            'redirect_open' => 'Redirect Open',
            'redirect_confirm' => 'Redirect Confirm',
            'redirect_decline' => 'Redirect Decline',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'decline_comment' => 'Decline Comment',
        ];
    }

    /**
     * Gets query for [[PaymentsystemIndigo24Transactions]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\PaymentsystemIndigo24TransactionsQuery
     */
    public function getPaymentsystemIndigo24Transactions()
    {
        return $this->hasMany(PaymentsystemIndigo24Transactions::className(), ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\FinanceTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsQuery(get_called_class());
    }
}
