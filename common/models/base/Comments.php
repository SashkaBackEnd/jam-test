<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int|null $user__id
 * @property string|null $username
 * @property string|null $name Имя пользователя
 * @property string|null $email Email пользователя
 * @property int|null $object_alias_id
 * @property string|null $upline
 * @property int|null $is_delete
 * @property int|null $is_edit
 * @property int|null $is_editable
 * @property int|null $status_id
 * @property string|null $comment_text
 * @property float $rating Оценка
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'object_alias_id', 'is_delete', 'is_edit', 'is_editable', 'status_id', 'created_by', 'modified_by'], 'integer'],
            [['rating'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['username', 'name', 'email', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['upline'], 'string', 'max' => 4096],
            [['comment_text'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'username' => 'Username',
            'name' => 'Name',
            'email' => 'Email',
            'object_alias_id' => 'Object Alias ID',
            'upline' => 'Upline',
            'is_delete' => 'Is Delete',
            'is_edit' => 'Is Edit',
            'is_editable' => 'Is Editable',
            'status_id' => 'Status ID',
            'comment_text' => 'Comment Text',
            'rating' => 'Rating',
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
     * @return \common\models\base\query\CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CommentsQuery(get_called_class());
    }
}
