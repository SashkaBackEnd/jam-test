<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_rules".
 *
 * @property int $id
 * @property string|null $service_alias Псевдоним правила (для экспорта SQL-датасета, удобного обновления и т.д.)
 * @property int $process_events__id
 * @property string $status_alias Статус правила
 * @property int|null $sort_no
 * @property int|null $is_show_for_admin Отображать ли администратору (сервисное ли событие)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessRules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_events__id'], 'required'],
            [['process_events__id', 'sort_no', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['status_alias'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['service_alias'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['service_alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_alias' => 'Service Alias',
            'process_events__id' => 'Process Events  ID',
            'status_alias' => 'Status Alias',
            'sort_no' => 'Sort No',
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
     * @return \common\models\base\query\ProcessRulesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessRulesQuery(get_called_class());
    }
}
