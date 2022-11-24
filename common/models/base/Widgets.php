<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "widgets".
 *
 * @property int $id
 * @property string|null $destination Место применения (cmspage - CMS-страницы, userpage - личные страницы пользователей)
 * @property string|null $object_alias
 * @property int|null $atatchment__id_icon
 * @property int|null $atatchment__id_screen
 * @property int $is_active Статус виджета (0 - выключен, 1 - включен)
 * @property int $is_show_for_admin Показывать администратору сайта (0 - скрыть, 1 - показать)
 * @property string|null $url
 * @property string|null $table_name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Widgets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widgets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atatchment__id_icon', 'atatchment__id_screen', 'is_active', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['destination', 'object_alias', 'table_name'], 'string', 'max' => 50],
            [['url', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'destination' => 'Destination',
            'object_alias' => 'Object Alias',
            'atatchment__id_icon' => 'Atatchment  Id Icon',
            'atatchment__id_screen' => 'Atatchment  Id Screen',
            'is_active' => 'Is Active',
            'is_show_for_admin' => 'Is Show For Admin',
            'url' => 'Url',
            'table_name' => 'Table Name',
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
     * @return \common\models\base\query\WidgetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WidgetsQuery(get_called_class());
    }
}
