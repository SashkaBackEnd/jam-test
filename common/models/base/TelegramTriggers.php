<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "telegram_triggers".
 *
 * @property int $id
 * @property string|null $command Команда пришедшая из телеграм
 * @property string|null $title
 * @property string|null $path Путь к классу, обработчику события
 * @property string|null $class Название класса
 * @property string|null $method Название метода
 * @property int|null $is_active Активный или нет
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class TelegramTriggers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_triggers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['command', 'title'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 1000],
            [['class', 'method', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'command' => 'Command',
            'title' => 'Title',
            'path' => 'Path',
            'class' => 'Class',
            'method' => 'Method',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\TelegramTriggersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\TelegramTriggersQuery(get_called_class());
    }
}
