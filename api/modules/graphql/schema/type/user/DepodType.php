<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\CityType;
use api\modules\graphql\schema\type\segment\CountryType;
use api\modules\graphql\schema\type\segment\RegionType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class DepodType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Бонусы пользователя за период',
            'fields' => fn() => [
                'id' => Type::id(),
                'name' => [
                    'description' => 'Номер заказа',
                    'type' => Type::int(),
                ],
                'data' => [
                    'description' => 'Дата',
                    'type' => Type::string(),
                ],
                'status' => [
                    'description' => 'Статус заказа',
                    'type' => Type::int(),
                ],
                'address' => [
                    'description' => 'Адрес доставки',
                    'type' => Type::string(),
                ],
                'country' => TypeRegistry::get(CountryType::class)->getConfig(),
                'region' => TypeRegistry::get(RegionType::class)->getConfig(),
                'city' => TypeRegistry::get(CityType::class)->getConfig(),
            ],
        ]);
    }
}
