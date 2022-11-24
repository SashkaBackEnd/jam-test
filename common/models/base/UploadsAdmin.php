<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_admin".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $file_name
 * @property int|null $local_path
 * @property string|null $local_name
 * @property string|null $type
 * @property string|null $youtube_code
 * @property int|null $is_paid
 * @property string|null $role All - все
 * @property string|null $date
 * @property string|null $comments
 * @property string|null $comment_for_seo
 * @property string|null $alt
 * @property string|null $type_of_file
 * @property int|null $category__id
 * @property int|null $current_category__id
 * @property int|null $deleted
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['local_path', 'is_paid', 'category__id', 'current_category__id', 'deleted', 'created_by', 'modified_by'], 'integer'],
            [['date', 'created_at', 'modified_at'], 'safe'],
            [['name', 'file_name', 'local_name', 'role', 'comments', 'comment_for_seo', 'alt', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['type', 'type_of_file'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'file_name' => 'File Name',
            'local_path' => 'Local Path',
            'local_name' => 'Local Name',
            'type' => 'Type',
            'youtube_code' => 'Youtube Code',
            'is_paid' => 'Is Paid',
            'role' => 'Role',
            'date' => 'Date',
            'comments' => 'Comments',
            'comment_for_seo' => 'Comment For Seo',
            'alt' => 'Alt',
            'type_of_file' => 'Type Of File',
            'category__id' => 'Category  ID',
            'current_category__id' => 'Current Category  ID',
            'deleted' => 'Deleted',
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
     * @return \common\models\base\query\UploadsAdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsAdminQuery(get_called_class());
    }
}
