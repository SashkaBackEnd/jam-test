<?php

namespace api\modules\graphql\schema\type\segment\list;

use api\exceptions\IContextableException;
use api\models\City;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\CityType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{InputObjectType, Type};

class CitiesType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Список городов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(CityType::class)),
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterCities',
                    'fields' => [
                        'region_id' => Type::int(),
                    ]
                ]),
            ],
            'resolve' => function ($model, $args) {
                try {
                    return City::find()
                        ->byRegion($args['filter']['region_id'])
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
