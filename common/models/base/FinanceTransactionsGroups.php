<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_groups".
 *
 * @property int $id
 * @property string $alias Псевдоним типа
 * @property string|null $title Описание типа
 * @property int $is_group_for_user 0 - группа для админа, 1 - группа для пользователя
 * @property int $is_view_allowed Отображать роль всем пользователям
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['is_group_for_user', 'is_view_allowed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'is_group_for_user' => 'Is Group For User',
            'is_view_allowed' => 'Is View Allowed',
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
     * @return \common\models\base\query\FinanceTransactionsGroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsGroupsQuery(get_called_class());
    }
}
