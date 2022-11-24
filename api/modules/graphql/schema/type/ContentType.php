<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type;

use api\exceptions\IContextableException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\CatalogType;
use api\modules\graphql\schema\type\content\list\CatalogsType;
use api\modules\graphql\schema\type\content\list\ProductsType;
use api\modules\graphql\schema\type\content\ProductType;
use api\modules\graphql\schema\TypeRegistry;
use api\traits\TraitAuthenticate;
use GraphQL\Type\Definition\Type;

class ContentType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'description' => 'Контент',
            'fields' => fn() => [
                'id' => Type::id(),
                'catalog' => TypeRegistry::get(CatalogType::class)->getConfig(),
                'catalogs' => TypeRegistry::get(CatalogsType::class)->getConfig(),
                'product' => TypeRegistry::get(ProductType::class)->getConfig(),
                'products' => TypeRegistry::get(ProductsType::class)->getConfig(),
            ],
            'resolve' => function () {
                return ['id' => 'content'];
            }
        ]);
    }
}
