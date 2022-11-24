<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\AuthorType;
use api\modules\graphql\schema\type\segment\BonusTypeType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class BonusType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Бонусы пользователя за период',
            'fields' => fn() => [
                'id' => Type::id(),
                'sum' => [
                    'description' => 'Сумма PV',
                    'type' => Type::int(),
                ],
                'percent' => [
                    'description' => '%',
                    'type' => Type::int(),
                ],
                'points_go' => [
                    'description' => 'Баллы в ГО',
                    'type' => Type::float(),
                ],
                'level' => [
                    'description' => 'Уровень',
                    'type' => Type::int(),
                ],
                'order_num' => [
                    'description' => 'Заказ №',
                    'type' => Type::int(),
                ],
                'author' => TypeRegistry::get(AuthorType::class)->getConfig(),
                'type' => TypeRegistry::get(BonusTypeType::class)->getConfig(),
            ],
        ]);
    }
}
