<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "blog_posts".
 *
 * @property int $id
 * @property int|null $status_id
 * @property int|null $can_read
 * @property string|null $publication_post
 * @property string|null $hide_post
 * @property int|null $blog_rubrics__id id рубрики
 * @property int|null $can_comment возможность комментировать
 * @property string|null $text
 * @property int|null $attachment__id id картинки
 * @property string $langs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BlogPosts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'can_read', 'blog_rubrics__id', 'can_comment', 'attachment__id', 'created_by', 'modified_by'], 'integer'],
            [['publication_post', 'hide_post', 'created_at', 'modified_at'], 'safe'],
            [['text'], 'string'],
            [['langs'], 'required'],
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
            'status_id' => 'Status ID',
            'can_read' => 'Can Read',
            'publication_post' => 'Publication Post',
            'hide_post' => 'Hide Post',
            'blog_rubrics__id' => 'Blog Rubrics  ID',
            'can_comment' => 'Can Comment',
            'text' => 'Text',
            'attachment__id' => 'Attachment  ID',
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
     * @return \common\models\base\query\BlogPostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BlogPostsQuery(get_called_class());
    }
}
