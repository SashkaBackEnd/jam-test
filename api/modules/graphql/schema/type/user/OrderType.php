<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\models\Order;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\CityType;
use api\modules\graphql\schema\type\segment\CountryType;
use api\modules\graphql\schema\type\segment\RegionType;
use api\modules\graphql\schema\type\user\order\list\OrderItemsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class OrderType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Заказ',
            'fields' => fn() => [
                'id' => Type::id(),
                'num' => [
                    'description' => 'Номер заказа',
                    'type' => Type::string(),
                ],
                'total_price' => [
                    'description' => 'Сумма заказа в PV',
                    'type' => Type::float(),
                ],
                'total_points' => [
                    'description' => 'Баллы в маркетинг',
                    'type' => Type::float(),
                ],
                'total_discount' => [
                    'description' => 'Скидка',
                    'type' => Type::float(),
                ],
                'user_price' => [
                    'description' => 'Сумма заказа в руб.',
                    'type' => Type::float(),
                ],
                'delivery_price' => [
                    'description' => 'Стоимость доставки',
                    'type' => Type::float(),
                ],
                'status' => [
                    'description' => 'Статус заказа',
                    'type' => Type::int(),
                ],
                'first_name' => [
                    'description' => 'Имя',
                    'type' => Type::string(),
                ],
                'last_name' => [
                    'description' => 'Фамилия',
                    'type' => Type::string(),
                ],
                'second_name' => [
                    'description' => 'Отчество',
                    'type' => Type::string(),
                ],
                'phone' => [
                    'description' => 'Телефон',
                    'type' => Type::string(),
                ],
                'address' => [
                    'description' => 'Адрес',
                    'type' => Type::string(),
                ],
                'commentary' => [
                    'description' => 'Комментарий к заказу',
                    'type' => Type::string(),
                ],
                'is_payed' => [
                    'description' => 'Статус оплаты',
                    'type' => Type::boolean(),
                ],
                'store_pay_types__id' => [
                    'description' => 'Способ оплаты id',
                    'type' => Type::int(),
                ],
                'pay_type' => [
                    'description' => 'Способ оплаты',
                    'type' => Type::string(),
                    'resolve' => function (Order $model) {
                        return $model->payType?->name ?? null;
                    }
                ],
                'date' => [
                    'description' => 'Дата заказа',
                    'type' => Type::string(),
                    'resolve' => function (Order $model) {
                        return $model->created_at ?? null;
                    }
                ],
                'delivery_place' => [
                    'description' => 'Доставки',
                    'type' => Type::string(),
                    'resolve' => function (Order $model) {
                        if ($model->warehouse) {
                            $row[] = 'Забрать из офиса';
                            !empty($model->warehouse->name) and $row[] = $model->warehouse->name;
                            !empty($model->warehouse->country?->name) and $row[] = $model->warehouse->country->name;
                            !empty($model->warehouse->region?->name) and $row[] = $model->warehouse->region->name;
                            !empty($model->warehouse->city?->name) and $row[] = $model->warehouse->city->name;
                            !empty($model->warehouse->address) and $row[] = $model->warehouse->address;
                            return implode(', ', $row);
                        }

                        return null;
                    }
                ],
                'country' => TypeRegistry::get(CountryType::class)->getConfig(),
                'region' => TypeRegistry::get(RegionType::class)->getConfig(),
                'city' => TypeRegistry::get(CityType::class)->getConfig(),
                'items' => TypeRegistry::get(OrderItemsType::class)->getConfig(),
            ],
        ]);
    }
}
