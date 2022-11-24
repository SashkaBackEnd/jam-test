<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_orders_reports_params".
 *
 * @property int $id
 * @property string|null $report_alias
 * @property int $dataset_per_page Количество записей на странице
 * @property int $is_filter Фильтрация по отчету: 0 - отключена, 1 - включена
 * @property int $is_filter_available Позволить администратору редактировать филтрацию: 0 - нет, 1 - да
 * @property int $is_active Админский статус отчета: 0 - не отображать пользователям, 1 - отображать пользователям
 * @property int $is_on Суперадминский статус: 0 - не отображать администратору, 1 - отображать администратору
 * @property int $datefilter_type Тип фильтра по дате (1 - фильтруется двумя полями от и до, 2 - фильтруется одним селектом со списокм месяцев)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class OfficeOrdersReportsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_orders_reports_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dataset_per_page', 'is_filter', 'is_filter_available', 'is_active', 'is_on', 'datefilter_type', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['report_alias'], 'string', 'max' => 50],
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
            'report_alias' => 'Report Alias',
            'dataset_per_page' => 'Dataset Per Page',
            'is_filter' => 'Is Filter',
            'is_filter_available' => 'Is Filter Available',
            'is_active' => 'Is Active',
            'is_on' => 'Is On',
            'datefilter_type' => 'Datefilter Type',
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
     * @return \common\models\base\query\OfficeOrdersReportsParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeOrdersReportsParamsQuery(get_called_class());
    }
}
