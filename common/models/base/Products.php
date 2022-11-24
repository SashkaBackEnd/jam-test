<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $langs
 * @property string|null $article
 * @property int|null $status
 * @property int|null $available
 * @property string $product_type
 * @property int|null $title_picture__id id 
 * @property string $url
 * @property int $show_at_home Показывать на главной странице: 0 - не показывать, 1 - показывать
 * @property string $price_formation_type Максимально допустимая цена добавления в корзину товара (для произвольного инвестирования)
 * @property float $price
 * @property float $price_max Максимально допустимая цена добавления в корзину товара (для произвольного инвестирования)
 * @property float $price_client
 * @property float $points
 * @property int|null $limit Ограничение на покупку, шт.
 * @property float|null $discount_distr
 * @property float|null $discount_client
 * @property float $discount_partner
 * @property int|null $is_register
 * @property int|null $currency__id
 * @property int|null $product_special_statuses__id
 * @property int $is_deleted
 * @property float $rating Оценка продукта
 * @property float $admin_rating
 * @property int $is_admin_rating
 * @property int $likes_count Количество лайков
 * @property int $dislikes_count Количество дислайков
 * @property string $defult_visibility_status
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property int|null $width
 * @property int|null $height
 * @property int|null $length
 * @property float|null $weight
 * @property int $admin_likes Лайки установленные администраторм
 * @property int $admin_dislikes Дислайки установленные администраторм
 * @property int $left_zero
 * @property int $leftover Порог остатков
 * @property int $volume Объем
 * @property int $quantity_in_one_place Количество в одном месте
 * @property int|null $activity_month
 * @property string|null $getcourse_url
 * @property int $sort
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'available', 'title_picture__id', 'show_at_home', 'limit', 'is_register', 'currency__id', 'product_special_statuses__id', 'is_deleted', 'is_admin_rating', 'likes_count', 'dislikes_count', 'created_by', 'modified_by', 'width', 'height', 'length', 'admin_likes', 'admin_dislikes', 'left_zero', 'leftover', 'volume', 'quantity_in_one_place', 'activity_month', 'sort'], 'integer'],
            [['product_type', 'url', 'price', 'price_client', 'points'], 'required'],
            [['product_type', 'defult_visibility_status', 'getcourse_url'], 'string'],
            [['price', 'price_max', 'price_client', 'points', 'discount_distr', 'discount_client', 'discount_partner', 'rating', 'admin_rating', 'weight'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'langs', 'price_formation_type', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['article', 'url'], 'string', 'max' => 255],
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
            'langs' => 'Langs',
            'article' => 'Article',
            'status' => 'Status',
            'available' => 'Available',
            'product_type' => 'Product Type',
            'title_picture__id' => 'Title Picture  ID',
            'url' => 'Url',
            'show_at_home' => 'Show At Home',
            'price_formation_type' => 'Price Formation Type',
            'price' => 'Price',
            'price_max' => 'Price Max',
            'price_client' => 'Price Client',
            'points' => 'Points',
            'limit' => 'Limit',
            'discount_distr' => 'Discount Distr',
            'discount_client' => 'Discount Client',
            'discount_partner' => 'Discount Partner',
            'is_register' => 'Is Register',
            'currency__id' => 'Currency  ID',
            'product_special_statuses__id' => 'Product Special Statuses  ID',
            'is_deleted' => 'Is Deleted',
            'rating' => 'Rating',
            'admin_rating' => 'Admin Rating',
            'is_admin_rating' => 'Is Admin Rating',
            'likes_count' => 'Likes Count',
            'dislikes_count' => 'Dislikes Count',
            'defult_visibility_status' => 'Defult Visibility Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'width' => 'Width',
            'height' => 'Height',
            'length' => 'Length',
            'weight' => 'Weight',
            'admin_likes' => 'Admin Likes',
            'admin_dislikes' => 'Admin Dislikes',
            'left_zero' => 'Left Zero',
            'leftover' => 'Leftover',
            'volume' => 'Volume',
            'quantity_in_one_place' => 'Quantity In One Place',
            'activity_month' => 'Activity Month',
            'getcourse_url' => 'Getcourse Url',
            'sort' => 'Sort',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductsQuery(get_called_class());
    }
}
