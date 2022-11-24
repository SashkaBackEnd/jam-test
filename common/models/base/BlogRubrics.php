<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "blog_rubrics".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $tree_level
 * @property string|null $upline
 * @property string $label
 * @property string|null $parent_upline
 * @property int $sort_no
 * @property string|null $sort_upline
 * @property int|null $children_count
 * @property string|null $langs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BlogRubrics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_rubrics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'tree_level', 'sort_no', 'children_count', 'created_by', 'modified_by'], 'integer'],
            [['label', 'sort_no'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['upline', 'parent_upline', 'sort_upline'], 'string', 'max' => 4096],
            [['label'], 'string', 'max' => 255],
            [['langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'tree_level' => 'Tree Level',
            'upline' => 'Upline',
            'label' => 'Label',
            'parent_upline' => 'Parent Upline',
            'sort_no' => 'Sort No',
            'sort_upline' => 'Sort Upline',
            'children_count' => 'Children Count',
            'langs' => 'Langs',
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
     * @return \common\models\base\query\BlogRubricsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BlogRubricsQuery(get_called_class());
    }
}
