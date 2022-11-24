<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_additional_models".
 *
 * @property int $id
 * @property string|null $class_name
 * @property string|null $import
 * @property int $is_use Статус: 0 - не используется, 1 - используется
 * @property string|null $relation Название связи с моделью Users
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterAdditionalModels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_additional_models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_use'], 'required'],
            [['is_use', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['class_name'], 'string', 'max' => 500],
            [['import'], 'string', 'max' => 200],
            [['relation'], 'string', 'max' => 30],
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
            'class_name' => 'Class Name',
            'import' => 'Import',
            'is_use' => 'Is Use',
            'relation' => 'Relation',
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
     * @return \common\models\base\query\UsersRegisterAdditionalModelsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterAdditionalModelsQuery(get_called_class());
    }
}
