<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_blocked_roles".
 *
 * @property int $id
 * @property int|null $users__id
 * @property string|null $role
 * @property int $is_active Статус роли: 1 - активная роль заблокированного пользователя, будет назначена после разблокировки, 0 - неактивная роль
 * @property int $blocked_by Источник блока: 1 - администратор, 0 - система
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersBlockedRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_blocked_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'is_active', 'blocked_by', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['role'], 'string', 'max' => 64],
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
            'users__id' => 'Users  ID',
            'role' => 'Role',
            'is_active' => 'Is Active',
            'blocked_by' => 'Blocked By',
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
     * @return \common\models\base\query\UsersBlockedRolesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersBlockedRolesQuery(get_called_class());
    }
}
