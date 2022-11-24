<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_orders_reports_columns".
 *
 * @property int $id
 * @property int|null $office_orders_columns__id
 * @property int $is_used 0 - Не отображается, 1 - Отображается
 * @property int|null $sort_no Сортировка полей
 * @property int $is_filter Статус фильтрации по полю: 0 - выключена, 1 - включена
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class OfficeOrdersReportsColumns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_orders_reports_columns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_orders_columns__id', 'is_used', 'sort_no', 'is_filter', 'created_by', 'modified_by'], 'integer'],
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
            'office_orders_columns__id' => 'Office Orders Columns  ID',
            'is_used' => 'Is Used',
            'sort_no' => 'Sort No',
            'is_filter' => 'Is Filter',
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
     * @return \common\models\base\query\OfficeOrdersReportsColumnsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeOrdersReportsColumnsQuery(get_called_class());
    }
}
