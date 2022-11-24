<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_pay_types_amount".
 *
 * @property int $id
 * @property int|null $store_pay_types__id
 * @property int $is_increase 1 - повышать, 0 - уменьшать
 * @property int $is_used Статус: 0 - неактивный тип, 1 - активный тип
 * @property int $type_change Тип повышения цены: 1 - процент(*x/100), 2 - надбавка(+x), 3 - пропорция(*x)
 * @property float $value x
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StorePayTypesAmount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_pay_types_amount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_pay_types__id', 'is_increase', 'is_used', 'type_change', 'created_by', 'modified_by'], 'integer'],
            [['value'], 'number'],
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
            'store_pay_types__id' => 'Store Pay Types  ID',
            'is_increase' => 'Is Increase',
            'is_used' => 'Is Used',
            'type_change' => 'Type Change',
            'value' => 'Value',
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
     * @return \common\models\base\query\StorePayTypesAmountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StorePayTypesAmountQuery(get_called_class());
    }
}
