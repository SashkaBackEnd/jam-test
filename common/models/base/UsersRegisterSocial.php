<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_social".
 *
 * @property int $id
 * @property string|null $alias Псевдоним социальной сети
 * @property string|null $title Название социальной сети
 * @property int|null $is_use Использовать ли в регистрации и авторизации
 * @property int|null $show_for_admin
 * @property string|null $description Описание
 * @property string|null $created_at Дата создания записи
 * @property int|null $created_by Автор создания записи
 * @property string|null $created_ip IP создания записи
 * @property string|null $modified_at Дата редактирования записи
 * @property int|null $modified_by Редактор записи
 * @property string|null $modified_ip IP редактирования записи
 */
class UsersRegisterSocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_use', 'show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'title'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'is_use' => 'Is Use',
            'show_for_admin' => 'Show For Admin',
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
     * @return \common\models\base\query\UsersRegisterSocialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterSocialQuery(get_called_class());
    }
}
