<?php

namespace api\modules\graphql\schema\type\content;

use api\exceptions\IContextableException;
use api\models\Catalog;
use api\models\Product;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\list\ProductsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{InputObjectType, Type};

class CatalogType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Каталог товаров',
            'fields' => fn() => [
                'id' => Type::int(),
                'alias' => Type::string(),
                'url' => Type::string(),
                'name' => [
                    'type' => Type::string(),
                    'resolve' => function (Catalog $model) {
                        return $model->getName();
                    }
                ],
                'description' => [
                    'type' => Type::string(),
                    'resolve' => function (Catalog $model) {
                        return $model->getDescription();
                    }
                ],
                'icon' => [
                    'description' => 'Иконка категории',
                    'type' => Type::string(),
                    'resolve' => function (Catalog $model) {
                        return "/images/store/catalog/icon/{$model->id}.svg";
                    }
                ],
                'images' => [
                    'type' => Type::listOf(TypeRegistry::get(CatalogImageType::class)),
                    'resolve' => function (Catalog $model) {
                        return $model->getImages()->all();
                    }
                ],
                'is_new' => Type::boolean(),
                'products' => TypeRegistry::get(ProductsType::class)->getConfig(),
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterCatalog',
                    'fields' => [
                        'id' => Type::int(),
                    ]
                ]),
            ],
            'resolve' => function ($model, $args) {
                try {
                    $query = Catalog::find();

                    (isset($args['filter']['id'])) and $query->byId($args['filter']['id']);

                    return $query->one() ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
