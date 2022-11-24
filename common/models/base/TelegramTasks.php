<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "telegram_tasks".
 *
 * @property int $id
 * @property string|null $path Путь к классу, обработчику события
 * @property string|null $class Название класса
 * @property string|null $method Название метода
 * @property int|null $is_active Активный или нет
 * @property int|null $limit
 * @property int|null $offset
 * @property string|null $object_alias
 * @property int|null $object_id
 * @property string|null $start_date дата начала выполнения задачи
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TelegramTasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'limit', 'offset', 'object_id', 'created_by', 'modified_by'], 'integer'],
            [['start_date', 'created_at', 'modified_at'], 'safe'],
            [['path'], 'string', 'max' => 1000],
            [['class', 'method', 'object_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
            'is_active' => 'Is Active',
            'limit' => 'Limit',
            'offset' => 'Offset',
            'object_alias' => 'Object Alias',
            'object_id' => 'Object ID',
            'start_date' => 'Start Date',
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
     * @return \common\models\base\query\TelegramTasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TelegramTasksQuery(get_called_class());
    }
}
