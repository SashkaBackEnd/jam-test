<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "system_letters".
 *
 * @property int $id
 * @property string|null $alias Алиас события при котором будет отправлено письмо
 * @property string|null $action_name Название события при котором будет отправлено письмо
 * @property string|null $title Заголовок стандартного письма
 * @property string|null $content Содержимое письма
 * @property int|null $blacklist_ignore Отправлять письмо, даже, если получатель находится в черном списке
 * @property string|null $module Модуль отвечающий за уведомление
 * @property string|null $module_version Минимальная версия модуля
 * @property int|null $is_base 1-искать шаблон в таблице локализации 0-активен базовый шаблон письма
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SystemLetters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_letters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['blacklist_ignore', 'is_base', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'action_name', 'title', 'module'], 'string', 'max' => 250],
            [['module_version'], 'string', 'max' => 10],
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
            'alias' => 'Alias',
            'action_name' => 'Action Name',
            'title' => 'Title',
            'content' => 'Content',
            'blacklist_ignore' => 'Blacklist Ignore',
            'module' => 'Module',
            'module_version' => 'Module Version',
            'is_base' => 'Is Base',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\SystemLettersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SystemLettersQuery(get_called_class());
    }
}
