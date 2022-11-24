<?php

namespace api\modules\graphql\schema\type\content\list;

use api\exceptions\IContextableException;
use api\models\Product;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\ProductPackageType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class ProductPackagesType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Список продуктов в пакете',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(ProductPackageType::class)),
            ],
            'args' => [
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function ($model) {
                try {
                    if ($model instanceof Product) {
                        $query = $model->getPackages();

                        $query->limit($args['limit'] ?? null);
                        $query->offset($args['offset'] ?? null);

                        return $query->getArrayEntity();
                    }
                    return null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ];

        parent::__construct($config);
    }
}
