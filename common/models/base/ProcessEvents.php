<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_events".
 *
 * @property int $id
 * @property string $alias Псевдоним события
 * @property string $status_alias Статус события
 * @property string|null $module_owner Модуль события
 * @property string|null $class Класс обработчик события
 * @property int|null $is_show_for_admin Отображать ли администратору (сервисное ли событие)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['status_alias'], 'string'],
            [['is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['class'], 'string', 'max' => 255],
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
            'status_alias' => 'Status Alias',
            'module_owner' => 'Module Owner',
            'class' => 'Class',
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
     * @return \common\models\base\query\ProcessEventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessEventsQuery(get_called_class());
    }
}
