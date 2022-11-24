<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_periods_types_customization".
 *
 * @property int $id
 * @property int $marketing_periods_types__id id конфигурируемой кастомной записи
 * @property int $marketing_periods_types_base__id id базовой записи, что берется за основу
 * @property float $multiplier Масштаб длительности базового периода
 * @property float $offset_days Смещение в днях относительно границ базового периода
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPeriodsTypesCustomization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_periods_types_customization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marketing_periods_types__id', 'marketing_periods_types_base__id'], 'required'],
            [['marketing_periods_types__id', 'marketing_periods_types_base__id', 'created_by', 'modified_by'], 'integer'],
            [['multiplier', 'offset_days'], 'number'],
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
            'marketing_periods_types__id' => 'Marketing Periods Types  ID',
            'marketing_periods_types_base__id' => 'Marketing Periods Types Base  ID',
            'multiplier' => 'Multiplier',
            'offset_days' => 'Offset Days',
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
     * @return \common\models\base\query\MarketingPeriodsTypesCustomizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPeriodsTypesCustomizationQuery(get_called_class());
    }
}
