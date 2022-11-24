<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_delivery_types".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $name
 * @property float $price
 * @property int $is_used
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreDeliveryTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_delivery_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price'], 'number'],
            [['is_used', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
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
            'alias' => 'Alias',
            'name' => 'Name',
            'price' => 'Price',
            'is_used' => 'Is Used',
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
     * @return \common\models\base\query\StoreDeliveryTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreDeliveryTypesQuery(get_called_class());
    }
}
