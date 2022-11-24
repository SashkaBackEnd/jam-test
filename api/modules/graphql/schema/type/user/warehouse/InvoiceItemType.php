<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse;

use api\models\InvoiceItem;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\ProductType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class InvoiceItemType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Заказ',
            'fields' => fn() => [
                'id' => Type::id(),
                'price' => [
                    'description' => 'Цена',
                    'type' => Type::float(),
                ],
                'count' => [
                    'description' => 'Количество',
                    'type' => Type::int(),
                ],
                'product' => [
                    'type' => TypeRegistry::get(ProductType::class),
                    'resolve' => function (InvoiceItem $model) {
                        return $model->getProduct()->one() ?? null;
                    }
                ],
            ],
        ]);
    }
}
