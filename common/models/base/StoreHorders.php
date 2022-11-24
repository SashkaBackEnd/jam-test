<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_horders".
 *
 * @property int $id
 * @property int $is_sync_a
 * @property string|null $num Номер заказа
 * @property int|null $users__id
 * @property float|null $total_price Общая цена
 * @property float|null $total_points Общая сумма баллов
 * @property float $total_discount
 * @property float $user_price
 * @property int|null $user_currency
 * @property float $delivery_price
 * @property float $user_delivery_price
 * @property int|null $store_delivery_types__id Способ доставки
 * @property int|null $store_pay_types__id Способ оплаты
 * @property int|null $war_warehouse__id
 * @property int|null $delivery_war_warehouse__id
 * @property int|null $store_delivery_types_options__id
 * @property int|null $currencies_rate__id
 * @property string|null $commentary Комментарий к заказу
 * @property int|null $status Статус заказа
 * @property int|null $is_payed
 * @property int|null $is_unregistered_customer Создан ли заказ незарегистрированным пользователем
 * @property string|null $first_name Для случая когда пользователь не хочет использовать данные из профайла
 * @property string|null $last_name Для случая когда пользователь не хочет использовать данные из профайла
 * @property string|null $second_name Для случая когда пользователь не хочет использовать данные из профайла
 * @property int|null $country__id
 * @property int|null $region__id
 * @property int|null $city__id
 * @property int|null $zip_code
 * @property string|null $district Район доставки
 * @property string|null $phone Телефон
 * @property string|null $address Адрес доставки
 * @property string|null $street Улица доставки
 * @property string|null $apartments Номер дома и квартиры
 * @property string|null $admin_commentary Номер дома и квартиры
 * @property string|null $track_number трек-номер
 * @property string|null $additional_field Адаптивное поле
 * @property string|null $closed_at Дата исполнения заказа
 * @property string|null $declined_at Дата отмены заказа
 * @property int $is_from_store
 * @property int $is_getcourse
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 * @property int $add_discount
 */
class StoreHorders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_horders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_sync_a', 'users__id', 'user_currency', 'store_delivery_types__id', 'store_pay_types__id', 'war_warehouse__id', 'delivery_war_warehouse__id', 'store_delivery_types_options__id', 'currencies_rate__id', 'status', 'is_payed', 'is_unregistered_customer', 'country__id', 'region__id', 'city__id', 'zip_code', 'is_from_store', 'is_getcourse', 'created_by', 'modified_by', 'add_discount'], 'integer'],
            [['total_price', 'total_points', 'total_discount', 'user_price', 'delivery_price', 'user_delivery_price'], 'number'],
            [['commentary', 'admin_commentary'], 'string'],
            [['closed_at', 'declined_at', 'created_at', 'modified_at'], 'safe'],
            [['num'], 'string', 'max' => 24],
            [['first_name', 'last_name', 'second_name', 'district', 'phone', 'address', 'street', 'apartments', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['track_number'], 'string', 'max' => 200],
            [['additional_field'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_sync_a' => 'Is Sync A',
            'num' => 'Num',
            'users__id' => 'Users  ID',
            'total_price' => 'Total Price',
            'total_points' => 'Total Points',
            'total_discount' => 'Total Discount',
            'user_price' => 'User Price',
            'user_currency' => 'User Currency',
            'delivery_price' => 'Delivery Price',
            'user_delivery_price' => 'User Delivery Price',
            'store_delivery_types__id' => 'Store Delivery Types  ID',
            'store_pay_types__id' => 'Store Pay Types  ID',
            'war_warehouse__id' => 'War Warehouse  ID',
            'delivery_war_warehouse__id' => 'Delivery War Warehouse  ID',
            'store_delivery_types_options__id' => 'Store Delivery Types Options  ID',
            'currencies_rate__id' => 'Currencies Rate  ID',
            'commentary' => 'Commentary',
            'status' => 'Status',
            'is_payed' => 'Is Payed',
            'is_unregistered_customer' => 'Is Unregistered Customer',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'second_name' => 'Second Name',
            'country__id' => 'Country  ID',
            'region__id' => 'Region  ID',
            'city__id' => 'City  ID',
            'zip_code' => 'Zip Code',
            'district' => 'District',
            'phone' => 'Phone',
            'address' => 'Address',
            'street' => 'Street',
            'apartments' => 'Apartments',
            'admin_commentary' => 'Admin Commentary',
            'track_number' => 'Track Number',
            'additional_field' => 'Additional Field',
            'closed_at' => 'Closed At',
            'declined_at' => 'Declined At',
            'is_from_store' => 'Is From Store',
            'is_getcourse' => 'Is Getcourse',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'add_discount' => 'Add Discount',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\StoreHordersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreHordersQuery(get_called_class());
    }
}
