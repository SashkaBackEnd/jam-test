<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "comments_settings".
 *
 * @property int $id
 * @property string|null $object_alias
 * @property int|null $is_editable
 * @property int $edit_time
 * @property int $is_accessable
 * @property int $is_moderation
 * @property int $is_capcha
 * @property int|null $commentator_name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CommentsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_editable', 'edit_time', 'is_accessable', 'is_moderation', 'is_capcha', 'commentator_name', 'created_by', 'modified_by'], 'integer'],
            [['edit_time', 'is_accessable', 'is_moderation'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias'], 'string', 'max' => 200],
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
            'object_alias' => 'Object Alias',
            'is_editable' => 'Is Editable',
            'edit_time' => 'Edit Time',
            'is_accessable' => 'Is Accessable',
            'is_moderation' => 'Is Moderation',
            'is_capcha' => 'Is Capcha',
            'commentator_name' => 'Commentator Name',
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
     * @return \common\models\base\query\CommentsSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CommentsSettingsQuery(get_called_class());
    }
}
