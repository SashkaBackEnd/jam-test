<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_stats_columns".
 *
 * @property int $id
 * @property string|null $report_alias Тип отчета
 * @property string|null $column
 * @property int $is_filter_allowed Допустима фильтрация по полю: 0 - нет, 1 - да
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class OfficeStatsColumns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_stats_columns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_filter_allowed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['report_alias'], 'string', 'max' => 50],
            [['column', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_alias' => 'Report Alias',
            'column' => 'Column',
            'is_filter_allowed' => 'Is Filter Allowed',
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
     * @return \common\models\base\query\OfficeStatsColumnsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeStatsColumnsQuery(get_called_class());
    }
}
