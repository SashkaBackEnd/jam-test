<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "comments_object_aliases".
 *
 * @property int $id
 * @property string|null $object_alias
 * @property string|null $object_id идентификатор сущности
 * @property string|null $description
 * @property int|null $default_comment_status_id
 * @property int|null $default_comment_is_editable
 * @property int|null $comments_is_editable
 * @property int|null $is_active
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CommentsObjectAliases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments_object_aliases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['default_comment_status_id', 'default_comment_is_editable', 'comments_is_editable', 'is_active', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias'], 'string', 'max' => 200],
            [['object_id'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['object_alias', 'object_id'], 'unique', 'targetAttribute' => ['object_alias', 'object_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object_alias' => 'Object Alias',
            'object_id' => 'Object ID',
            'description' => 'Description',
            'default_comment_status_id' => 'Default Comment Status ID',
            'default_comment_is_editable' => 'Default Comment Is Editable',
            'comments_is_editable' => 'Comments Is Editable',
            'is_active' => 'Is Active',
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
     * @return \common\models\base\query\CommentsObjectAliasesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CommentsObjectAliasesQuery(get_called_class());
    }
}
