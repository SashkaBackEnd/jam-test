<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "war_horders_ranged".
 *
 * @property int|null $warehouse__id
 * @property int|null $product__id
 * @property float|null $price
 * @property int|null $count
 * @property string|null $status
 * @property string|null $type
 * @property string|null $created_at
 * @property string $target
 * @property int $horder__id
 */
class WarHordersRanged extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_horders_ranged';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['warehouse__id', 'product__id', 'count', 'horder__id'], 'integer'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['status', 'type'], 'string', 'max' => 50],
            [['target'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'warehouse__id' => 'Warehouse  ID',
            'product__id' => 'Product  ID',
            'price' => 'Price',
            'count' => 'Count',
            'status' => 'Status',
            'type' => 'Type',
            'created_at' => 'Created At',
            'target' => 'Target',
            'horder__id' => 'Horder  ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\WarHordersRangedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\WarHordersRangedQuery(get_called_class());
    }
}
