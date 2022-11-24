<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_wallets_operations".
 *
 * @property int $id
 * @property int|null $finance_wallets_for_new_user__id ID типа кошелька
 * @property string|null $finance_transactions_specs__alias Спецификация финансовой операции
 * @property int $is_active Статус операции для кошелька пользователя
 * @property int $is_show_for_admin Показывать администратору
 * @property string|null $created_at Время создания записи
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip IP веб-пользователя (users.id), который создал запись
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip IP веб-пользователя (users.id), который внес изменения
 */
class OfficeWalletsOperations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_wallets_operations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_wallets_for_new_user__id', 'is_active', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['finance_transactions_specs__alias'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['finance_transactions_specs__alias', 'finance_wallets_for_new_user__id'], 'unique', 'targetAttribute' => ['finance_transactions_specs__alias', 'finance_wallets_for_new_user__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'finance_wallets_for_new_user__id' => 'Finance Wallets For New User  ID',
            'finance_transactions_specs__alias' => 'Finance Transactions Specs  Alias',
            'is_active' => 'Is Active',
            'is_show_for_admin' => 'Is Show For Admin',
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
     * @return \common\models\base\query\OfficeWalletsOperationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeWalletsOperationsQuery(get_called_class());
    }
}
