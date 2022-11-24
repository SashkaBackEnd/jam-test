<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "navigation_prepare".
 *
 * @property int $id
 * @property string $label
 * @property string|null $parent_alias
 * @property int $is_visible
 * @property string $url
 * @property string|null $alias
 * @property string|null $icon_alias
 * @property string $object_alias
 * @property int $object_id
 * @property string|null $module_owner Модуль, к которому относится данный пункт меню
 * @property string|null $target
 * @property int|null $attachment__id
 * @property int $is_show_for_admin Показывать пункт меню администратору: 0 - сервисный пункт меню (только для суперадмина), 1 - базовый пункт меню
 * @property string|null $bizrule
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NavigationPrepare extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation_prepare';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label', 'is_visible', 'url', 'object_alias', 'object_id'], 'required'],
            [['is_visible', 'object_id', 'attachment__id', 'is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['bizrule'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['label', 'object_alias', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['parent_alias', 'alias', 'icon_alias'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 1000],
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
            'parent_alias' => 'Parent Alias',
            'is_visible' => 'Is Visible',
            'url' => 'Url',
            'alias' => 'Alias',
            'icon_alias' => 'Icon Alias',
            'object_alias' => 'Object Alias',
            'object_id' => 'Object ID',
            'module_owner' => 'Module Owner',
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
     * @return \common\models\base\query\NavigationPrepareQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NavigationPrepareQuery(get_called_class());
    }
}
