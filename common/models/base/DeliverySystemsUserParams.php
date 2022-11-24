<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "delivery_systems_user_params".
 *
 * @property int $id
 * @property int $user__id
 * @property string|null $name
 * @property string|null $delivery_name
 * @property string|null $value
 */
class DeliverySystemsUserParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_systems_user_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id'], 'required'],
            [['user__id'], 'integer'],
            [['value'], 'string'],
            [['name', 'delivery_name'], 'string', 'max' => 255],
            [['delivery_name', 'user__id', 'name'], 'unique', 'targetAttribute' => ['delivery_name', 'user__id', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'name' => 'Name',
            'delivery_name' => 'Delivery Name',
            'value' => 'Value',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\DeliverySystemsUserParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\DeliverySystemsUserParamsQuery(get_called_class());
    }
}
