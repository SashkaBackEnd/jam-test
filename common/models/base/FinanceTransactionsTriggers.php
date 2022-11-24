<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_triggers".
 *
 * @property int $id
 * @property string|null $spec_alias Псевдоним спецификации
 * @property string|null $status_alias Статус транзакции
 * @property string|null $currency_alias Валюта
 * @property string|null $path Путь к классу, обработчику события
 * @property string|null $class Название класса
 * @property string|null $method Название метода
 * @property string|null $module_owner Имя модуля владельца
 * @property int|null $is_active Активный или нет
 * @property int $sort_no
 * @property int $is_any_alias Выполнять тригер для любой операции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FinanceTransactionsTriggers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_triggers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'sort_no', 'is_any_alias', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['spec_alias', 'status_alias', 'currency_alias', 'class', 'method', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['path'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'spec_alias' => 'Spec Alias',
            'status_alias' => 'Status Alias',
            'currency_alias' => 'Currency Alias',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
            'module_owner' => 'Module Owner',
            'is_active' => 'Is Active',
            'sort_no' => 'Sort No',
            'is_any_alias' => 'Is Any Alias',
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
     * @return \common\models\base\query\FinanceTransactionsTriggersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsTriggersQuery(get_called_class());
    }
}
