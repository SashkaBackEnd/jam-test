<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_basket".
 *
 * @property int $id
 * @property string|null $session_id Сессия пользователя
 * @property int|null $catalogues_products__id Связь с продуктом каталога
 * @property float $chosen_price Цена, по которой товар был добавлен в корзину
 * @property int|null $count Количество продуктов
 * @property int|null $status
 * @property int $is_present
 * @property int|null $promotions_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreBasket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_basket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalogues_products__id', 'count', 'status', 'is_present', 'promotions_id', 'created_by', 'modified_by'], 'integer'],
            [['chosen_price'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['session_id'], 'string', 'max' => 255],
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
            'session_id' => 'Session ID',
            'catalogues_products__id' => 'Catalogues Products  ID',
            'chosen_price' => 'Chosen Price',
            'count' => 'Count',
            'status' => 'Status',
            'is_present' => 'Is Present',
            'promotions_id' => 'Promotions ID',
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
     * @return \common\models\base\query\StoreBasketQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreBasketQuery(get_called_class());
    }
}
