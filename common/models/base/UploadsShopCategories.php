<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_shop_categories".
 *
 * @property int $id
 * @property string|null $category
 * @property int|null $parent_id
 * @property string|null $upline
 * @property string|null $parent_upline
 * @property int|null $tree_level
 * @property string|null $avatar
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsShopCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_shop_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'tree_level', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['category', 'avatar', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['upline', 'parent_upline'], 'string', 'max' => 4096],
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
            'avatar' => 'Avatar',
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
     * @return \common\models\base\query\UploadsShopCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsShopCategoriesQuery(get_called_class());
    }
}
