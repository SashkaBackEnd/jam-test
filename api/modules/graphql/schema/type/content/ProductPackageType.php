<?php

namespace api\modules\graphql\schema\type\content;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class ProductPackageType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Информация о покете продукта',
            'fields' => fn() => [
                'id' => Type::int(),
                'count' => [
                    'description' => 'Количество',
                    'type' => Type::int()
                ],
                'product' => TypeRegistry::get(ProductType::class)->getConfig(),
            ]
        ]);
    }
}
