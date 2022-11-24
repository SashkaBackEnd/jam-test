<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "admin_user_customization".
 *
 * @property int $id
 * @property int|null $type 1 - rules, 2 - relations
 * @property string|null $name здесь пишем имя связи для типа relations или название таблицы для типа rules
 * @property string|null $param1 если это поле заполняется для типа relations, то возможные значения :CHasOneRelation, CBelongsToRelation, CHasManyRelation, CManyManyRelation; если поле заполняется для типа rules - то в него вносим имя поля, на которое пишем правило
 * @property string|null $param2 для rules - тип органичения, для relations - связываемая модель
 * @property string|null $param3 для relations - ключ для связи, для rules - param3 и param4 образуют key=>value
 * @property string|null $param4 для rules - param5 и param6 образуют key=>value, для relations - адрес импорта модели для связи
 * @property string|null $param5 для rules - param5 и param6 образуют key=>value
 * @property string|null $param6
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class AdminUserCustomization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_user_customization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'param1', 'param2', 'param3', 'param4', 'param5', 'param6', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'param1' => 'Param1',
            'param2' => 'Param2',
            'param3' => 'Param3',
            'param4' => 'Param4',
            'param5' => 'Param5',
            'param6' => 'Param6',
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
     * @return \common\models\base\query\AdminUserCustomizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AdminUserCustomizationQuery(get_called_class());
    }
}
