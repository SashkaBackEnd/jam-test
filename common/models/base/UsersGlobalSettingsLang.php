<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_global_settings_lang".
 *
 * @property int $id
 * @property string $lang
 * @property int $users_global_settings__id
 * @property string $name
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersGlobalSettingsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_global_settings_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'users_global_settings__id', 'name'], 'required'],
            [['users_global_settings__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang', 'description', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'users_global_settings__id' => 'Users Global Settings  ID',
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
     * @return \common\models\base\query\UsersGlobalSettingsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersGlobalSettingsLangQuery(get_called_class());
    }
}
