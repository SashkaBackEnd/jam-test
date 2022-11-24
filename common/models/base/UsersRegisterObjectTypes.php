<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_object_types".
 *
 * @property int $id
 * @property string|null $alias Тип выборки: register - набор полей при регистрации; adminadd - набор полей при добавлении админом; profile - набор полей при редактировании/просмотре профиля. Типы выборки могут быть специфичными для отдельно взятых проектов
 * @property int $is_active Статус: 0 - выключено (данные берутся из алиаса register), 1 - включено
 * @property int $is_sorting Включена ли для данного набора полей сортировка (0 - выключена, 1 - включена)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterObjectTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_object_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'is_sorting', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
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
            'is_active' => 'Is Active',
            'is_sorting' => 'Is Sorting',
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
     * @return \common\models\base\query\UsersRegisterObjectTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterObjectTypesQuery(get_called_class());
    }
}
