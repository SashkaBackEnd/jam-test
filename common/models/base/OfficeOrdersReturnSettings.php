<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_orders_return_settings".
 *
 * @property int $id
 * @property int $is_available_for_admin Существует ли возврат в системе: 0 - нет; 1 - да
 * @property int $is_on Включен ли возврат в системе: 0 - нет, 1 - да
 * @property int $is_enabled_jquery
 * @property int|null $finance_transactions_specs__id id финансовой операции возврата
 * @property int|null $finance_currency__id Валюта, в которой осуществляется возврат
 * @property int $increase_type Тип изменения суммы возврата: 0 - сумма не меняется; 1 - сумма понижается на коэффициент; 2 - сумма повышается на коэффициент; 3 - сумма понижается в коэффициент раз; 4 - сумма повышается в коэфициент раз
 * @property float $increase_coefficient Коэффициент изменения стоимости возврата
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class OfficeOrdersReturnSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_orders_return_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_available_for_admin', 'is_on', 'is_enabled_jquery', 'finance_transactions_specs__id', 'finance_currency__id', 'increase_type', 'created_by', 'modified_by'], 'integer'],
            [['increase_coefficient'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_available_for_admin' => 'Is Available For Admin',
            'is_on' => 'Is On',
            'is_enabled_jquery' => 'Is Enabled Jquery',
            'finance_transactions_specs__id' => 'Finance Transactions Specs  ID',
            'finance_currency__id' => 'Finance Currency  ID',
            'increase_type' => 'Increase Type',
            'increase_coefficient' => 'Increase Coefficient',
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
     * @return \common\models\base\query\OfficeOrdersReturnSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeOrdersReturnSettingsQuery(get_called_class());
    }
}
