<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products_to_users_discount".
 *
 * @property int $id
 * @property int|null $products__id
 * @property int|null $users__id
 * @property float|null $discount
 * @property int|null $is_percent
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductsToUsersDiscount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_to_users_discount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['products__id', 'users__id', 'is_percent', 'created_by', 'modified_by'], 'integer'],
            [['discount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['products__id', 'users__id'], 'unique', 'targetAttribute' => ['products__id', 'users__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'products__id' => 'Products  ID',
            'users__id' => 'Users  ID',
            'discount' => 'Discount',
            'is_percent' => 'Is Percent',
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
     * @return \common\models\base\query\ProductsToUsersDiscountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductsToUsersDiscountQuery(get_called_class());
    }
}
