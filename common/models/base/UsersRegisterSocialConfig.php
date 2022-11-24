<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_social_config".
 *
 * @property int $id
 * @property int|null $users_register_social__id
 * @property string|null $name Название параметра
 * @property string|null $value Значение параметра
 * @property string|null $description Описание
 * @property string|null $created_at Дата создания записи
 * @property int|null $created_by Автор создания записи
 * @property string|null $created_ip IP создания записи
 * @property string|null $modified_at Дата редактирования записи
 * @property int|null $modified_by Редактор записи
 * @property string|null $modified_ip IP редактирования записи
 */
class UsersRegisterSocialConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_social_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_register_social__id', 'created_by', 'modified_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'value'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['users_register_social__id', 'name', 'value'], 'unique', 'targetAttribute' => ['users_register_social__id', 'name', 'value']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_register_social__id' => 'Users Register Social  ID',
            'name' => 'Name',
            'value' => 'Value',
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
     * @return \common\models\base\query\UsersRegisterSocialConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterSocialConfigQuery(get_called_class());
    }
}
