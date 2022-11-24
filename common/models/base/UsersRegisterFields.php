<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_fields".
 *
 * @property int $id
 * @property string|null $object_alias Тип выборки: NULL - по умолчанию поля участвуют во всех выборках; register - набор полей при регистрации; adminadd - набор полей при добавлении админом; profile - набор полей при редактировании/просмотре профиля. Типы выборки могут быть специфичными для отдельно взятых проектов
 * @property int|null $section__id
 * @property string|null $table
 * @property string|null $field
 * @property int|null $is_required
 * @property int|null $is_use
 * @property string|null $label
 * @property string|null $step_alias
 * @property int $always_use Всегда использовать: 0 - нет, 1 - да
 * @property int $is_show_for_admin Показывать поле администратору: 0 - нет, 1 - да
 * @property int $is_allowed_to_edit Разрешить администратору редактировать параметры поля: 0 - нет, 1 - да
 * @property int $is_user_filltype Тип заполнения поля: 0 - заполняется программно, 1 - выводится на форме
 * @property int|null $sort_no Сортировка
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section__id', 'is_required', 'is_use', 'always_use', 'is_show_for_admin', 'is_allowed_to_edit', 'is_user_filltype', 'sort_no', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias'], 'string', 'max' => 50],
            [['table', 'field', 'label', 'step_alias'], 'string', 'max' => 255],
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
            'object_alias' => 'Object Alias',
            'section__id' => 'Section  ID',
            'table' => 'Table',
            'field' => 'Field',
            'is_required' => 'Is Required',
            'is_use' => 'Is Use',
            'label' => 'Label',
            'step_alias' => 'Step Alias',
            'always_use' => 'Always Use',
            'is_show_for_admin' => 'Is Show For Admin',
            'is_allowed_to_edit' => 'Is Allowed To Edit',
            'is_user_filltype' => 'Is User Filltype',
            'sort_no' => 'Sort No',
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
     * @return \common\models\base\query\UsersRegisterFieldsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterFieldsQuery(get_called_class());
    }
}
