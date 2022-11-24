<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "news_lang".
 *
 * @property int $id
 * @property int|null $news__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $path
 * @property string|null $short_title
 * @property string|null $text
 * @property string|null $clear_text
 * @property string|null $brief_text
 * @property string|null $description
 * @property int|null $preview_id
 * @property int|null $attachment_id
 * @property string|null $keywords
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NewsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news__id', 'preview_id', 'attachment_id', 'created_by', 'modified_by'], 'integer'],
            [['text', 'clear_text', 'brief_text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'description', 'keywords'], 'string', 'max' => 1000],
            [['path'], 'string', 'max' => 255],
            [['short_title'], 'string', 'max' => 80],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['lang', 'news__id'], 'unique', 'targetAttribute' => ['lang', 'news__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news__id' => 'News  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'path' => 'Path',
            'short_title' => 'Short Title',
            'text' => 'Text',
            'clear_text' => 'Clear Text',
            'brief_text' => 'Brief Text',
            'description' => 'Description',
            'preview_id' => 'Preview ID',
            'attachment_id' => 'Attachment ID',
            'keywords' => 'Keywords',
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
     * @return \common\models\base\query\NewsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NewsLangQuery(get_called_class());
    }
}
