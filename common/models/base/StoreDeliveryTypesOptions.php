<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_delivery_types_options".
 *
 * @property int $id
 * @property int $store_delivery_types__id
 * @property string $name
 * @property int $is_use
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreDeliveryTypesOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_delivery_types_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_delivery_types__id', 'name', 'created_at', 'modified_at'], 'required'],
            [['store_delivery_types__id', 'is_use', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'store_delivery_types__id' => 'Store Delivery Types  ID',
            'name' => 'Name',
            'is_use' => 'Is Use',
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
     * @return \common\models\base\query\StoreDeliveryTypesOptionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreDeliveryTypesOptionsQuery(get_called_class());
    }
}
