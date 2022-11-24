<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $finpassword
 * @property string|null $app_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 *
 * @property Users[] $children
 * @property Users[] $parents
 * @property ProfilePaymentAddressesPaybox[] $profilePaymentAddressesPayboxes
 * @property UsersTreepath[] $usersTreepaths
 * @property UsersTreepath[] $usersTreepaths0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['username', 'email', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['password', 'finpassword'], 'string', 'max' => 128],
            [['app_id'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'finpassword' => 'Finpassword',
            'app_id' => 'App ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * Gets query for [[Children]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Users::className(), ['id' => 'child_id'])->viaTable('users_treepath', ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parents]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersQuery
     */
    public function getParents()
    {
        return $this->hasMany(Users::className(), ['id' => 'parent_id'])->viaTable('users_treepath', ['child_id' => 'id']);
    }

    /**
     * Gets query for [[ProfilePaymentAddressesPayboxes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\ProfilePaymentAddressesPayboxQuery
     */
    public function getProfilePaymentAddressesPayboxes()
    {
        return $this->hasMany(ProfilePaymentAddressesPaybox::className(), ['users__id' => 'id']);
    }

    /**
     * Gets query for [[UsersTreepaths]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersTreepathQuery
     */
    public function getUsersTreepaths()
    {
        return $this->hasMany(UsersTreepath::className(), ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[UsersTreepaths0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\base\query\UsersTreepathQuery
     */
    public function getUsersTreepaths0()
    {
        return $this->hasMany(UsersTreepath::className(), ['child_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersQuery(get_called_class());
    }
}
