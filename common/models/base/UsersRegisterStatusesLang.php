<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_statuses_lang".
 *
 * @property int $id
 * @property int|null $users_register_statuses__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterStatusesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_statuses_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_register_statuses__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['users_register_statuses__id', 'lang'], 'unique', 'targetAttribute' => ['users_register_statuses__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_register_statuses__id' => 'Users Register Statuses  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
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
     * @return \common\models\base\query\UsersRegisterStatusesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterStatusesLangQuery(get_called_class());
    }
}
