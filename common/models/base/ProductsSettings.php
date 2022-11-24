<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products_settings".
 *
 * @property int $id
 * @property int $is_set_points Включить оценку продукции для авторизованных пользователей
 * @property int $is_set_points_for_guest Включить оценку продукции для гостей
 * @property int $is_change_points
 * @property int $is_admin_points
 * @property int $rating_type Тип оценки товара: 1 - звёзды, 2 - лайки
 * @property int $add_likes_count Количество добавленных лайков
 * @property int $add_dislikes_count
 * @property int|null $is_add Добавить/установить начальное значение оценки товарв
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property float $add_rating Начальное значение рейтинга
 */
class ProductsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_set_points', 'is_set_points_for_guest', 'is_change_points', 'is_admin_points', 'rating_type', 'add_likes_count', 'add_dislikes_count', 'is_add', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['add_rating'], 'number'],
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
            'is_set_points' => 'Is Set Points',
            'is_set_points_for_guest' => 'Is Set Points For Guest',
            'is_change_points' => 'Is Change Points',
            'is_admin_points' => 'Is Admin Points',
            'rating_type' => 'Rating Type',
            'add_likes_count' => 'Add Likes Count',
            'add_dislikes_count' => 'Add Dislikes Count',
            'is_add' => 'Is Add',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'add_rating' => 'Add Rating',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ProductsSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductsSettingsQuery(get_called_class());
    }
}
