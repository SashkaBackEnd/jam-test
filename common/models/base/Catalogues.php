<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "catalogues".
 *
 * @property int $id
 * @property string $alias
 * @property int|null $parent_id
 * @property string $upline
 * @property int $tree_level
 * @property int|null $sort_no
 * @property string|null $sort_order
 * @property string|null $url
 * @property int|null $is_content_page
 * @property int|null $is_new
 * @property int|null $attachment__id
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Catalogues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalogues';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'upline', 'tree_level', 'created_at', 'modified_at'], 'required'],
            [['parent_id', 'tree_level', 'sort_no', 'is_content_page', 'is_new', 'attachment__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 255],
            [['upline', 'sort_order'], 'string', 'max' => 9000],
            [['url'], 'string', 'max' => 1000],
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
            'parent_id' => 'Parent ID',
            'upline' => 'Upline',
            'tree_level' => 'Tree Level',
            'sort_no' => 'Sort No',
            'sort_order' => 'Sort Order',
            'url' => 'Url',
            'is_content_page' => 'Is Content Page',
            'is_new' => 'Is New',
            'attachment__id' => 'Attachment  ID',
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
     * @return \common\models\base\query\CataloguesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CataloguesQuery(get_called_class());
    }
}
