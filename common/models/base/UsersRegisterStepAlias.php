<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_step_alias".
 *
 * @property int $id
 * @property string|null $step_alias
 * @property string|null $step_name Название шага - отображается администратору
 * @property string|null $step_description
 * @property string|null $step_action
 * @property int $step_num
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterStepAlias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_step_alias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['step_num'], 'required'],
            [['step_num', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['step_alias', 'step_description', 'step_action'], 'string', 'max' => 255],
            [['step_name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['step_num'], 'unique'],
            [['step_alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'step_alias' => 'Step Alias',
            'step_name' => 'Step Name',
            'step_description' => 'Step Description',
            'step_action' => 'Step Action',
            'step_num' => 'Step Num',
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
     * @return \common\models\base\query\UsersRegisterStepAliasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterStepAliasQuery(get_called_class());
    }
}
