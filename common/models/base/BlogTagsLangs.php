<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "blog_tags_langs".
 *
 * @property int $id
 * @property int $blog_tags__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BlogTagsLangs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_tags_langs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_tags__id'], 'required'],
            [['blog_tags__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 128],
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
            'blog_tags__id' => 'Blog Tags  ID',
            'lang' => 'Lang',
            'name' => 'Name',
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
     * @return \common\models\base\query\BlogTagsLangsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BlogTagsLangsQuery(get_called_class());
    }
}
