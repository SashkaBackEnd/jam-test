<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "blog_posts_lang".
 *
 * @property int $id
 * @property int|null $blog_posts__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $path
 * @property string|null $meta_title
 * @property string|null $description
 * @property string|null $keywords Ключевые слова
 * @property string|null $short_text
 * @property string|null $text
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BlogPostsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_posts_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_posts__id', 'created_by', 'modified_by'], 'integer'],
            [['short_text', 'text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 3],
            [['title', 'description'], 'string', 'max' => 1000],
            [['path', 'meta_title', 'keywords'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_posts__id' => 'Blog Posts  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'path' => 'Path',
            'meta_title' => 'Meta Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'short_text' => 'Short Text',
            'text' => 'Text',
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
     * @return \common\models\base\query\BlogPostsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BlogPostsLangQuery(get_called_class());
    }
}
