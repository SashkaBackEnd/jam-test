<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_temp".
 *
 * @property int $id
 * @property string $sponsor_id
 * @property string $user_id
 * @property string|null $user_email
 * @property string|null $user_name
 */
class UsersTemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sponsor_id', 'user_id'], 'required'],
            [['sponsor_id', 'user_id'], 'string', 'max' => 100],
            [['user_email', 'user_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sponsor_id' => 'Sponsor ID',
            'user_id' => 'User ID',
            'user_email' => 'User Email',
            'user_name' => 'User Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\UsersTempQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersTempQuery(get_called_class());
    }
}
