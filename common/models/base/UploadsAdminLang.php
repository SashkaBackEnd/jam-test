<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_admin_lang".
 *
 * @property int $id
 * @property int|null $uploads_admin__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $file_name
 * @property int|null $local_path
 * @property string|null $local_name
 * @property string|null $type
 * @property string|null $youtube_code
 * @property string|null $key_words
 * @property string|null $comments
 * @property string|null $comment_for_seo
 * @property string|null $alt
 * @property string|null $author
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsAdminLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_admin_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uploads_admin__id', 'local_path', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['name', 'file_name', 'local_name', 'key_words', 'comments', 'comment_for_seo', 'alt', 'author', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['youtube_code'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uploads_admin__id' => 'Uploads Admin  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'file_name' => 'File Name',
            'local_path' => 'Local Path',
            'local_name' => 'Local Name',
            'type' => 'Type',
            'youtube_code' => 'Youtube Code',
            'key_words' => 'Key Words',
            'comments' => 'Comments',
            'comment_for_seo' => 'Comment For Seo',
            'alt' => 'Alt',
            'author' => 'Author',
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
     * @return \common\models\base\query\UploadsAdminLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsAdminLangQuery(get_called_class());
    }
}
