<?php

namespace api\modules\graphql\schema\type\segment;

use api\models\City;
use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\{Type};

class SexType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Пол',
            'fields' => fn() => [
                'id' => Type::int(),
                'name' => Type::string(),
            ]
        ]);
    }
}
