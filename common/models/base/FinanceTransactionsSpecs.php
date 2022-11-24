<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_specs".
 *
 * @property int $id Идентификатор
 * @property string $alias Алиас фин.операции
 * @property string $debit_object_alias Псевдоним финансового объекта отправителя
 * @property string $debit_purpose_alias Псевдоним назначения кошелька
 * @property string $credit_object_alias Псевдоним финансового объекта отправителя
 * @property string $credit_purpose_alias Псевдоним назначения кошелька
 * @property string|null $title Текст, отображающийся в списке фин.операций и фильтре
 * @property string|null $description Описание фин.операции. Подставляется через константы в шаблоне.
 * @property string $group_alias Група транзакции
 * @property int|null $is_used Статус использования (1 - используется, 0 - нет)
 * @property int|null $is_wallet_update Изменяет сумму в кошельке
 * @property int|null $is_comment_form_show Показывать форму с комментарием
 * @property int|null $is_comment_require Требовать комментарий
 * @property int|null $is_admin_password_require Требует ли пароль для подтверждения от администратора
 * @property int|null $is_debit_password_require Требует ли для подтверждения пароль от отправителя
 * @property int|null $is_credit_password_require Требует ли для подтверждения от получателя
 * @property int|null $is_confirm_from_admin Требует ли подтверждения администратора
 * @property int|null $is_confirm_from_debit Требует ли подтверждения отправителя
 * @property int|null $is_confirm_from_credit Требует ли подтверждения получателя
 * @property int|null $is_allowed_increase_amount Разрешать проводить операции с измененной суммой в сторону увеличения
 * @property int|null $is_allowed_reduce_amount Разрешать проводить операции с измененной суммой в сторону уменьшения
 * @property int|null $is_allowed_amount_zero Разрешить проведение операции с нулевой суммой
 * @property int $is_hide_from_user Отображение операции для пользователя: 0 - операция отображается пользователю, 1 - операция скрыта от пользователя. (Не влияет на отображение операций администратору)
 * @property int $is_service Тип транзакции: 0 - стандартная операция, 1 - сервисная транзакция (не отображается)
 * @property string|null $redirect_open Url куда перенаправить после открытия транзакции
 * @property string|null $redirect_confirm Url куда перенаправить после подтверждения транзакции
 * @property string|null $redirect_decline Url куда перенаправить после отклонения транзакции
 * @property string|null $payments_system__alias Псевдоним платежной системы
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsSpecs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_specs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'debit_object_alias', 'debit_purpose_alias', 'credit_object_alias', 'credit_purpose_alias', 'group_alias'], 'required'],
            [['is_used', 'is_wallet_update', 'is_comment_form_show', 'is_comment_require', 'is_admin_password_require', 'is_debit_password_require', 'is_credit_password_require', 'is_confirm_from_admin', 'is_confirm_from_debit', 'is_confirm_from_credit', 'is_allowed_increase_amount', 'is_allowed_reduce_amount', 'is_allowed_amount_zero', 'is_hide_from_user', 'is_service', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'description', 'payments_system__alias'], 'string', 'max' => 255],
            [['debit_object_alias', 'debit_purpose_alias', 'credit_object_alias', 'credit_purpose_alias', 'group_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['title', 'redirect_open', 'redirect_confirm', 'redirect_decline'], 'string', 'max' => 1000],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'debit_object_alias' => 'Debit Object Alias',
            'debit_purpose_alias' => 'Debit Purpose Alias',
            'credit_object_alias' => 'Credit Object Alias',
            'credit_purpose_alias' => 'Credit Purpose Alias',
            'title' => 'Title',
            'description' => 'Description',
            'group_alias' => 'Group Alias',
            'is_used' => 'Is Used',
            'is_wallet_update' => 'Is Wallet Update',
            'is_comment_form_show' => 'Is Comment Form Show',
            'is_comment_require' => 'Is Comment Require',
            'is_admin_password_require' => 'Is Admin Password Require',
            'is_debit_password_require' => 'Is Debit Password Require',
            'is_credit_password_require' => 'Is Credit Password Require',
            'is_confirm_from_admin' => 'Is Confirm From Admin',
            'is_confirm_from_debit' => 'Is Confirm From Debit',
            'is_confirm_from_credit' => 'Is Confirm From Credit',
            'is_allowed_increase_amount' => 'Is Allowed Increase Amount',
            'is_allowed_reduce_amount' => 'Is Allowed Reduce Amount',
            'is_allowed_amount_zero' => 'Is Allowed Amount Zero',
            'is_hide_from_user' => 'Is Hide From User',
            'is_service' => 'Is Service',
            'redirect_open' => 'Redirect Open',
            'redirect_confirm' => 'Redirect Confirm',
            'redirect_decline' => 'Redirect Decline',
            'payments_system__alias' => 'Payments System  Alias',
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
     * @return \common\models\base\query\FinanceTransactionsSpecsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsSpecsQuery(get_called_class());
    }
}
