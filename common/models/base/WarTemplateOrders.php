<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_template_orders".
 *
 * @property int $id
 * @property int|null $template__id
 * @property int|null $product__id
 * @property int|null $count
 * @property float|null $point
 * @property float|null $price
 * @property float|null $purchase_price
 * @property float $rate_usd
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class WarTemplateOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_template_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['template__id', 'product__id', 'count', 'created_by', 'modified_by'], 'integer'],
            [['point', 'price', 'purchase_price', 'rate_usd'], 'number'],
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
            'template__id' => 'Template  ID',
            'product__id' => 'Product  ID',
            'count' => 'Count',
            'point' => 'Point',
            'price' => 'Price',
            'purchase_price' => 'Purchase Price',
            'rate_usd' => 'Rate Usd',
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
     * @return \common\models\base\query\WarTemplateOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarTemplateOrdersQuery(get_called_class());
    }
}
