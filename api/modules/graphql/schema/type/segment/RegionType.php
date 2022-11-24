<?php

namespace api\modules\graphql\schema\type\segment;

use api\interfaces\RegionInterface;
use api\models\Region;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\list\CitiesType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class RegionType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Информация о регионе',
            'fields' => fn() => [
                'id' => Type::int(),
                'name' => [
                    'type' => Type::string(),
                    'resolve' => fn(Region $model) => $model?->getName(),
                ],
                'cities' => TypeRegistry::get(CitiesType::class)->getConfig(),
            ],
            'resolve' => function (RegionInterface $model) {
                return $model->getRegion()->one();
            }
        ];

        parent::__construct($config);
    }
}
