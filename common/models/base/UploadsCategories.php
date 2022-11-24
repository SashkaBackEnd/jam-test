<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_categories".
 *
 * @property int $id
 * @property string|null $category
 * @property int|null $parent_id
 * @property string|null $upline
 * @property string|null $parent_upline
 * @property int|null $tree_level
 * @property int $sort_no
 * @property string|null $sort_upline
 * @property string $object_alias
 * @property int $children_count
 * @property string|null $avatar
 * @property string|null $banner
 * @property string $role
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'tree_level', 'sort_no', 'children_count', 'created_by', 'modified_by'], 'integer'],
            [['banner'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['category', 'avatar', 'role', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['upline', 'parent_upline'], 'string', 'max' => 4096],
            [['sort_upline'], 'string', 'max' => 4000],
            [['object_alias'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'parent_id' => 'Parent ID',
            'upline' => 'Upline',
            'parent_upline' => 'Parent Upline',
            'tree_level' => 'Tree Level',
            'sort_no' => 'Sort No',
            'sort_upline' => 'Sort Upline',
            'object_alias' => 'Object Alias',
            'children_count' => 'Children Count',
            'avatar' => 'Avatar',
            'banner' => 'Banner',
            'role' => 'Role',
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
     * @return \common\models\base\query\UploadsCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsCategoriesQuery(get_called_class());
    }
}
