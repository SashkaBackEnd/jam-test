<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_periods_types".
 *
 * @property int $id
 * @property string $alias Псевдоним
 * @property string $origin Происхождение типа отчетного периода: base - предустановленный разработчиками, для каждого делается свой класс; custom - делается пользователями, на основе базисных типов
 * @property string $status_alias Статус
 * @property int $is_main Основной период
 * @property string|null $class Класс обработчик типа периода
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPeriodsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_periods_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['origin', 'status_alias'], 'string'],
            [['is_main', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 30],
            [['class'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'origin' => 'Origin',
            'status_alias' => 'Status Alias',
            'is_main' => 'Is Main',
            'class' => 'Class',
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
     * @return \common\models\base\query\MarketingPeriodsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPeriodsTypesQuery(get_called_class());
    }
}
