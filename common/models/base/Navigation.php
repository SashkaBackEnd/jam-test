<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation".
 *
 * @property int $id
 * @property string $label
 * @property int|null $parent_id
 * @property string $upline
 * @property string|null $parent_upline
 * @property int $tree_level
 * @property int $sort_no
 * @property string|null $sort_upline
 * @property int $is_visible
 * @property string $url
 * @property string|null $alias
 * @property string|null $icon_alias
 * @property string $object_alias
 * @property int $object_id
 * @property string|null $module_owner Модуль, к которому относится данный пункт меню
 * @property int|null $children_count Количество подпунктов.
 * @property string|null $target
 * @property int|null $attachment__id
 * @property int $is_show_for_admin Показывать пункт меню администратору: 0 - сервисный пункт меню (только для суперадмина), 1 - базовый пункт меню
 * @property string|null $bizrule Код, проверяющий доступность пункта навигации
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Navigation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label', 'upline', 'tree_level', 'sort_no', 'is_visible', 'url', 'object_alias', 'object_id'], 'required'],
            [['parent_id', 'tree_level', 'sort_no', 'is_visible', 'object_id', 'children_count', 'attachment__id', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['bizrule'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['label', 'object_alias', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['upline', 'parent_upline', 'sort_upline'], 'string', 'max' => 4000],
            [['url'], 'string', 'max' => 1000],
            [['alias', 'icon_alias'], 'string', 'max' => 255],
            [['target'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'parent_id' => 'Parent ID',
            'upline' => 'Upline',
            'parent_upline' => 'Parent Upline',
            'tree_level' => 'Tree Level',
            'sort_no' => 'Sort No',
            'sort_upline' => 'Sort Upline',
            'is_visible' => 'Is Visible',
            'url' => 'Url',
            'alias' => 'Alias',
            'icon_alias' => 'Icon Alias',
            'object_alias' => 'Object Alias',
            'object_id' => 'Object ID',
            'module_owner' => 'Module Owner',
            'children_count' => 'Children Count',
            'target' => 'Target',
            'attachment__id' => 'Attachment  ID',
            'is_show_for_admin' => 'Is Show For Admin',
            'bizrule' => 'Bizrule',
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
     * @return \common\models\base\query\NavigationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationQuery(get_called_class());
    }
}
