<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_wallets_operations_list".
 *
 * @property int $id
 * @property string|null $finance_transactions_specs__alias Спецификация финансовой операции
 * @property int|null $direction Направление операции: (1 - Ввод финансов, 2 - Вывод финансов)
 * @property string|null $created_at Время создания записи
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip IP веб-пользователя (users.id), который создал запись
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip IP веб-пользователя (users.id), который внес изменения
 */
class OfficeWalletsOperationsList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_wallets_operations_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direction', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['finance_transactions_specs__alias'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['finance_transactions_specs__alias', 'direction'], 'unique', 'targetAttribute' => ['finance_transactions_specs__alias', 'direction']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'finance_transactions_specs__alias' => 'Finance Transactions Specs  Alias',
            'direction' => 'Direction',
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
     * @return \common\models\base\query\OfficeWalletsOperationsListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeWalletsOperationsListQuery(get_called_class());
    }
}
