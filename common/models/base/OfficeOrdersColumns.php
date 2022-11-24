<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_orders_columns".
 *
 * @property int $id
 * @property string|null $report_alias Тип отчета
 * @property string|null $column
 * @property string $title
 * @property string $description
 * @property int $is_filter_allowed Допустима фильтрация по полю: 0 - нет, 1 - да
 * @property int $is_show_for_admin Показывать администратору: 0 - нет, 1 - да
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class OfficeOrdersColumns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_orders_columns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['is_filter_allowed', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['report_alias', 'title'], 'string', 'max' => 50],
            [['column', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
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
            'title' => 'Title',
            'description' => 'Description',
            'is_filter_allowed' => 'Is Filter Allowed',
            'is_show_for_admin' => 'Is Show For Admin',
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
     * @return \common\models\base\query\OfficeOrdersColumnsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeOrdersColumnsQuery(get_called_class());
    }
}
