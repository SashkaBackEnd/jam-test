<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_global_settings".
 *
 * @property int $id
 * @property int $users__id
 * @property string $object_alias
 * @property string $object_name
 * @property string $alias
 * @property string $type
 * @property string|null $min
 * @property string|null $max
 * @property string|null $list
 * @property string|null $regexp
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersGlobalSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_global_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'object_alias', 'object_name', 'alias', 'type'], 'required'],
            [['users__id', 'created_by', 'modified_by'], 'integer'],
            [['list'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias', 'alias', 'type', 'min', 'max', 'regexp', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['object_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'object_alias' => 'Object Alias',
            'object_name' => 'Object Name',
            'alias' => 'Alias',
            'type' => 'Type',
            'min' => 'Min',
            'max' => 'Max',
            'list' => 'List',
            'regexp' => 'Regexp',
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
     * @return \common\models\base\query\UsersGlobalSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersGlobalSettingsQuery(get_called_class());
    }
}
