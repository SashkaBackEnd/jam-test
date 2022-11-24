<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "comments_objects_access".
 *
 * @property int $id
 * @property string $object__alias
 * @property string $role
 * @property string $action
 * @property string $created_at
 * @property int $created_by
 * @property string $created_ip
 * @property string $modified_at
 * @property int $modified_by
 * @property string $modified_ip
 */
class CommentsObjectsAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments_objects_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object__alias', 'role', 'action', 'created_at', 'created_by', 'created_ip', 'modified_at', 'modified_by', 'modified_ip'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['object__alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['role', 'action'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object__alias' => 'Object  Alias',
            'role' => 'Role',
            'action' => 'Action',
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
     * @return \common\models\base\query\CommentsObjectsAccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CommentsObjectsAccessQuery(get_called_class());
    }
}
