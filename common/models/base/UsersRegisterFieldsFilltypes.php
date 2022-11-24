<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_fields_filltypes".
 *
 * @property int $id
 * @property int|null $users_register_fields__id
 * @property int $type Тип программного заполнения (1 - генерируется случайным образом, 2 - соответствует определённому полю)
 * @property int|null $is_method_generate Актуально при type = 1: использовать специальный метод для генерации значения
 * @property string|null $import_method_generate Актуально при type = 1: адрес файла, в котором размещён метод для генерации значения
 * @property string|null $class_method_generate Актуально при type = 1: название класса, в котором размещён метод для генерации значения
 * @property string|null $method_generate Актуально при type = 1: название метода, используемого для генерации значения
 * @property string|null $relation_name Актуально при type = 2: название связи с моделью, в которой находится поле для данных
 * @property string|null $field_name Актуально при type = 2: название поля с необходимыми данными
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterFieldsFilltypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_fields_filltypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_register_fields__id', 'type', 'is_method_generate', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['import_method_generate'], 'string', 'max' => 200],
            [['class_method_generate'], 'string', 'max' => 255],
            [['method_generate'], 'string', 'max' => 50],
            [['relation_name', 'field_name'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['users_register_fields__id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_register_fields__id' => 'Users Register Fields  ID',
            'type' => 'Type',
            'is_method_generate' => 'Is Method Generate',
            'import_method_generate' => 'Import Method Generate',
            'class_method_generate' => 'Class Method Generate',
            'method_generate' => 'Method Generate',
            'relation_name' => 'Relation Name',
            'field_name' => 'Field Name',
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
     * @return \common\models\base\query\UsersRegisterFieldsFilltypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterFieldsFilltypesQuery(get_called_class());
    }
}
