<?php

namespace api\modules\graphql\schema\type\content\list;

use api\exceptions\IContextableException;
use api\models\Catalog;
use api\models\Product;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\CatalogType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{InputObjectType, Type};

class CatalogsType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Список каталогов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(CatalogType::class)),
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterCatalogs',
                    'fields' => [
                        'ids' => Type::listOf(Type::int()),
                    ]
                ]),
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function ($model, $args) {
                try {
                    if ($model instanceof Product) {
                        $query = $model->getCatalogs();
                    } else {
                        $query = Catalog::find();
                    }

                    (isset($args['filter']['ids'])) and $query->byIds((array) $args['filter']['ids']);

                    $query->byLevel(2);
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
