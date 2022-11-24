<?php

namespace api\modules\graphql\schema\type\segment;

use api\interfaces\CountryInterface;
use api\models\Country;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\list\CitiesType;
use api\modules\graphql\schema\type\segment\list\RegionsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class CountryType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Информация о стране',
            'fields' => fn() => [
                'id' => Type::int(),
                'name' => [
                    'type' => Type::string(),
                    'resolve' => fn(Country $model) => $model?->getName(),
                ],
                'cities' => TypeRegistry::get(CitiesType::class)->getConfig(),
                'regions' => TypeRegistry::get(RegionsType::class)->getConfig(),
            ],
            'resolve' => function (CountryInterface $model) {
                return $model->getCountry()->one();
            }
        ];

        parent::__construct($config);
    }
}
