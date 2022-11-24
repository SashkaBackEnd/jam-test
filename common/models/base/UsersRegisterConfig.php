<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_config".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 * @property string|null $title
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 1000],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'title' => 'Title',
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
     * @return \common\models\base\query\UsersRegisterConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterConfigQuery(get_called_class());
    }
}
