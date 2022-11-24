<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_orders_reports_params_lang".
 *
 * @property int $id
 * @property int|null $office_orders_reports_params__id
 * @property string|null $lang
 * @property string|null $title Название отчета
 * @property string|null $description Описание отчета
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class OfficeOrdersReportsParamsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_orders_reports_params_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_orders_reports_params__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['office_orders_reports_params__id', 'lang'], 'unique', 'targetAttribute' => ['office_orders_reports_params__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office_orders_reports_params__id' => 'Office Orders Reports Params  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
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
     * @return \common\models\base\query\OfficeOrdersReportsParamsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeOrdersReportsParamsLangQuery(get_called_class());
    }
}