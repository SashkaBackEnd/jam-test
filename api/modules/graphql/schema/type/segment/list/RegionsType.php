<?php

namespace api\modules\graphql\schema\type\segment\list;

use api\exceptions\IContextableException;
use api\models\Region;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\segment\RegionType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{InputObjectType, Type};

class RegionsType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Список регионов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(RegionType::class)),
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterRegions',
                    'fields' => [
                        'country_id' => Type::int(),
                    ]
                ]),
            ],
            'resolve' => function ($model, $args) {
                try {
                    return Region::find()
                        ->byCountry($args['filter']['country_id'])
                        ->joinWith('lang')
                        ->sortTranslationName()
                        ->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ];

        parent::__construct($config);
    }
}
