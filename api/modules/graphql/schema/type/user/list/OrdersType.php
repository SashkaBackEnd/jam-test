<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\list;

use api\models\User;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\OrderType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class OrdersType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список заказов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(OrderType::class)),
                'info' => TypeRegistry::get(OrdersInfoType::class)->getConfig(),
            ],
            'args' => [
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function (User $model, array $args) {
                $query = $model->getOrders();

                $query->limit($args['limit'] ?? null);
                $query->offset($args['offset'] ?? null);

//                $queryClone = clone $query;

                if ($data = $query->getArrayEntity()) {
                    $data->setInfo([
                        'sum_total_price' => (float)$query->sum('total_price'),
                        'sum_user_price' => (float)$query->sum('user_price'),
                    ]);
                }

                return $data ?? null;
            }
        ]);
    }
}
