<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_orders_map".
 *
 * @property int $id
 * @property int|null $store_horders__id
 * @property int|null $store_orders__id
 * @property int|null $catalogues_products__id
 * @property int|null $count
 * @property float|null $price
 * @property float|null $points
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreOrdersMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_orders_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_horders__id', 'store_orders__id', 'catalogues_products__id', 'count', 'created_by', 'modified_by'], 'integer'],
            [['price', 'points'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
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
            'store_horders__id' => 'Store Horders  ID',
            'store_orders__id' => 'Store Orders  ID',
            'catalogues_products__id' => 'Catalogues Products  ID',
            'count' => 'Count',
            'price' => 'Price',
            'points' => 'Points',
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
     * @return \common\models\base\query\StoreOrdersMapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreOrdersMapQuery(get_called_class());
    }
}
