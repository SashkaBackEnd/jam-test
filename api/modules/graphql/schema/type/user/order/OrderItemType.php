<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\order;

use api\models\OrderItem;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\ProductType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class OrderItemType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Позиция заказа',
            'fields' => fn() => [
                'id' => Type::id(),
                'count' => [
                    'description' => 'Количество позиций',
                    'type' => Type::int(),
                ],
                'price' => [
                    'description' => 'Цена за единицу',
                    'type' => Type::float(),
                ],
                'points' => [
                    'description' => 'PV',
                    'type' => Type::float(),
                ],
                'product' => [
                    'type' => TypeRegistry::get(ProductType::class),
                    'resolve' => function (OrderItem $model) {
                        return $model->getProduct()->one();
                    }
                ],
            ],
        ]);
    }
}
