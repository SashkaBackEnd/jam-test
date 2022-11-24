<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "blog_tags_map".
 *
 * @property int $blog_tags__id
 * @property int $blog_posts__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BlogTagsMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_tags_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_tags__id', 'blog_posts__id'], 'required'],
            [['blog_tags__id', 'blog_posts__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['blog_tags__id', 'blog_posts__id'], 'unique', 'targetAttribute' => ['blog_tags__id', 'blog_posts__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_tags__id' => 'Blog Tags  ID',
            'blog_posts__id' => 'Blog Posts  ID',
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
     * @return \common\models\base\query\BlogTagsMapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BlogTagsMapQuery(get_called_class());
    }
}
