<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "AuthItem".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string|null $description
 * @property string|null $bizrule
 * @property string|null $data
 * @property string|null $module_owner Модуль, к которому относится данная операция
 * @property int $is_service Скрыть роль/задачу/операцию от администратора: 0 - отображать, 1 - скрыть
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'AuthItem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'is_service', 'created_by', 'modified_by'], 'integer'],
            [['description', 'bizrule', 'data'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'type' => 'Type',
            'description' => 'Description',
            'bizrule' => 'Bizrule',
            'data' => 'Data',
            'module_owner' => 'Module Owner',
            'is_service' => 'Is Service',
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
     * @return \common\models\base\query\AuthItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AuthItemQuery(get_called_class());
    }
}
