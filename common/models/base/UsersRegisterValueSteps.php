<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_value_steps".
 *
 * @property int $id
 * @property string|null $table__name
 * @property string|null $field__name
 * @property string|null $value
 * @property string|null $index_ssesion
 * @property string|null $step
 * @property int|null $completed
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterValueSteps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_value_steps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['completed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['table__name', 'field__name', 'value', 'index_ssesion', 'step'], 'string', 'max' => 255],
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
            'table__name' => 'Table  Name',
            'field__name' => 'Field  Name',
            'value' => 'Value',
            'index_ssesion' => 'Index Ssesion',
            'step' => 'Step',
            'completed' => 'Completed',
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
     * @return \common\models\base\query\UsersRegisterValueStepsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterValueStepsQuery(get_called_class());
    }
}
