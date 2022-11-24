<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_groups_user".
 *
 * @property int $id
 * @property string $group_alias Псевдоним группы
 * @property string $spec_alias Псевдоним спецификации
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsGroupsUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_groups_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_alias', 'spec_alias'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['group_alias', 'spec_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_alias' => 'Group Alias',
            'spec_alias' => 'Spec Alias',
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
     * @return \common\models\base\query\FinanceTransactionsGroupsUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsGroupsUserQuery(get_called_class());
    }
}
