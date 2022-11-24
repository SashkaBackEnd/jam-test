<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\order\list;

use api\models\Order;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\order\OrderItemType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class OrderItemsType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список позиций в заказе',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(OrderItemType::class)),
            ],
            'args' => [
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function (Order $model, array $args) {
                $query = $model->getItems();

                $query->limit($args['limit'] ?? null);
                $query->offset($args['offset'] ?? null);

                return $query->getArrayEntity();
            }

        ]);
    }
}
