<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "blog_rubrics_lang".
 *
 * @property int $id
 * @property int|null $blog_rubrics__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BlogRubricsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_rubrics_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_rubrics__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 3],
            [['name', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
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
            'blog_rubrics__id' => 'Blog Rubrics  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
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
     * @return \common\models\base\query\BlogRubricsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BlogRubricsLangQuery(get_called_class());
    }
}
