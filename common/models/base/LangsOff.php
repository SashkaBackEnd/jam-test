<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "langs_off".
 *
 * @property int $id
 * @property string|null $module Название модуля
 * @property string|null $controller Название контроллера
 * @property string|null $action Название action-а
 * @property int $is_active Статус
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class LangsOff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'langs_off';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['module', 'controller', 'action'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['action', 'controller', 'module'], 'unique', 'targetAttribute' => ['action', 'controller', 'module']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
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
     * @return \common\models\base\query\LangsOffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\LangsOffQuery(get_called_class());
    }
}
