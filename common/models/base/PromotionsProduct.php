<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "promotions_product".
 *
 * @property int $id
 * @property int $promotions_id
 * @property int $block_id
 * @property int $product_id
 * @property int $count
 * @property string $type
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class PromotionsProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promotions_id', 'block_id', 'product_id', 'count', 'type'], 'required'],
            [['promotions_id', 'block_id', 'product_id', 'count', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['type'], 'string', 'max' => 255],
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
            'promotions_id' => 'Promotions ID',
            'block_id' => 'Block ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'type' => 'Type',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\PromotionsProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PromotionsProductQuery(get_called_class());
    }
}
