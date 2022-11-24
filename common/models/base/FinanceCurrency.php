<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_currency".
 *
 * @property int $id
 * @property string|null $alias Alias валюты
 * @property string|null $title
 * @property string|null $abbreviation
 * @property int|null $fractional_digits_count Количество используемых знаков после запятой. Большее количество знаков, чем указанное, игнорируется. Если вместе с указанной точностью, целая часть перевалила за величину, при которой общее количество знаков превышает 18 символов - фин. система должна выбрасывать ошибки, чтобы избегать фин. потерь из-за погрешностей.
 * @property int|null $show_fractional_digits_count Количество отображаемых знаков после запятой. Чисто визуальное отображение. Большее количество знаков, чем указанное, игнорируется.
 * @property float|null $max_transaction_amount Максимальный amount по одной фин. транзакции в рамках текущей валюты
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip IP веб-пользователя (users.id), который создал запись
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip IP веб-пользователя (users.id), который внес изменения
 * @property int|null $is_main
 * @property string|null $created_at Время создания записи
 */
class FinanceCurrency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fractional_digits_count', 'show_fractional_digits_count', 'created_by', 'modified_by', 'is_main'], 'integer'],
            [['max_transaction_amount'], 'number'],
            [['modified_at', 'created_at'], 'safe'],
            [['alias', 'title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['abbreviation'], 'string', 'max' => 20],
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
            'abbreviation' => 'Abbreviation',
            'fractional_digits_count' => 'Fractional Digits Count',
            'show_fractional_digits_count' => 'Show Fractional Digits Count',
            'max_transaction_amount' => 'Max Transaction Amount',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'is_main' => 'Is Main',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\FinanceCurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceCurrencyQuery(get_called_class());
    }
}
