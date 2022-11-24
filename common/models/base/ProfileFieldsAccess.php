<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_fields_access".
 *
 * @property int $id
 * @property int $users__id
 * @property int $field__id
 * @property int $is_visible_other_users
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileFieldsAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_fields_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'is_visible_other_users'], 'required'],
            [['users__id', 'field__id', 'is_visible_other_users', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
            'field__id' => 'Field  ID',
            'is_visible_other_users' => 'Is Visible Other Users',
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
     * @return \common\models\base\query\ProfileFieldsAccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileFieldsAccessQuery(get_called_class());
    }
}
