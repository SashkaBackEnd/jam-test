<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_fields_params".
 *
 * @property int $id
 * @property int|null $user_register_field__id
 * @property int $is_specific_widget
 * @property int $show_type Тип отображения на форме (для паролей: 0 - поле password с подтверждением, 1 - текстовое поле, 2 - динамечиски редактируемое поле; для пола: 0 - отображать два варианта, 1 - отображать дополнительно незаполненный вариант)
 * @property string|null $default_value Значение по умолчанию
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterFieldsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_fields_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_register_field__id', 'is_specific_widget', 'show_type', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['default_value'], 'string', 'max' => 500],
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
            'user_register_field__id' => 'User Register Field  ID',
            'is_specific_widget' => 'Is Specific Widget',
            'show_type' => 'Show Type',
            'default_value' => 'Default Value',
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
     * @return \common\models\base\query\UsersRegisterFieldsParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterFieldsParamsQuery(get_called_class());
    }
}
