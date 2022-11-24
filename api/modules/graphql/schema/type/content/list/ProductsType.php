<?php

namespace api\modules\graphql\schema\type\content\list;

use api\exceptions\IContextableException;
use api\models\Catalog;
use api\models\Product;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\ProductType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class ProductsType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Список продуктов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(ProductType::class)),
            ],
            'args' => [
//                'filter' => new InputObjectType([
//                    'name' => 'FilterProducts',
//                    'fields' => [
//                        'catalog_ids' => Type::listOf(Type::id()),
//                    ]
//                ]),
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function ($model, $args) {
                try {
                    if ($model instanceof Catalog) {
                        $query = $model->getProducts();
                    } else {
                        $query = Product::find();
//                        (isset($args['filter']['catalog_ids'])) and $query->limit((int) $args['limit']);
                    }

                    $query->limit($args['limit'] ?? null);
                    $query->offset($args['offset'] ?? null);

                    return $query->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ];

        parent::__construct($config);
    }
}
