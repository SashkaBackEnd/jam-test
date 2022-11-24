<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_triggers".
 *
 * @property int $id
 * @property string $type_addusers Тип добавления пользователя: register - при регистрации; adminadd- в админке ; profile в профиле; all - тремя способами;
 * @property string|null $events Событие: add- добавление записи, update - редактирование, delete -удаление
 * @property string|null $path Путь к классу, обработчику события
 * @property string|null $class Название класса
 * @property string|null $method Название метода
 * @property string|null $module_owner Имя модуля владельца
 * @property int|null $is_active Активный или нет
 * @property int $sort_no
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersTriggers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_triggers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'sort_no', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['type_addusers'], 'string', 'max' => 10],
            [['events'], 'string', 'max' => 255],
            [['path'], 'string', 'max' => 1000],
            [['class', 'method', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_addusers' => 'Type Addusers',
            'events' => 'Events',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
            'module_owner' => 'Module Owner',
            'is_active' => 'Is Active',
            'sort_no' => 'Sort No',
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
     * @return \common\models\base\query\UsersTriggersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersTriggersQuery(get_called_class());
    }
}
