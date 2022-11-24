<?php

namespace api\modules\graphql\schema\type\segment;

use api\interfaces\CityInterface;
use api\models\City;
use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\{Type};

class CityType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Информация о городе',
            'fields' => fn() => [
                'id' => Type::int(),
                'name' => [
                    'type' => Type::string(),
                    'resolve' => fn(City $city) => $city?->getName(),
                ],
            ],
            'resolve' => function (CityInterface $model) {
                return $model->getCity()->one();
            }
        ];

        parent::__construct($config);
    }
}
