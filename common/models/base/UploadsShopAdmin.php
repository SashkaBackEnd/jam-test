<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_shop_admin".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $local_name
 * @property string|null $type
 * @property int|null $is_paid
 * @property string|null $role All - все
 * @property string|null $date
 * @property string|null $comments
 * @property int|null $category__id
 * @property int|null $current_category__id
 * @property int|null $deleted
 * @property float|null $price_regular
 * @property float|null $price_vip
 * @property string|null $description_url
 * @property float|null $bonus_regular
 * @property float|null $bonus_vip
 * @property int|null $has_childs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsShopAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_shop_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_paid', 'category__id', 'current_category__id', 'deleted', 'has_childs', 'created_by', 'modified_by'], 'integer'],
            [['date', 'created_at', 'modified_at'], 'safe'],
            [['price_regular', 'price_vip', 'bonus_regular', 'bonus_vip'], 'number'],
            [['name', 'local_name', 'role', 'description_url', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['comments'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'local_name' => 'Local Name',
            'type' => 'Type',
            'is_paid' => 'Is Paid',
            'role' => 'Role',
            'date' => 'Date',
            'comments' => 'Comments',
            'category__id' => 'Category  ID',
            'current_category__id' => 'Current Category  ID',
            'deleted' => 'Deleted',
            'price_regular' => 'Price Regular',
            'price_vip' => 'Price Vip',
            'description_url' => 'Description Url',
            'bonus_regular' => 'Bonus Regular',
            'bonus_vip' => 'Bonus Vip',
            'has_childs' => 'Has Childs',
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
     * @return \common\models\base\query\UploadsShopAdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsShopAdminQuery(get_called_class());
    }
}
