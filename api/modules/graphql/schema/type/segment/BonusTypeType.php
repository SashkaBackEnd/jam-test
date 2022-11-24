<?php

namespace api\modules\graphql\schema\type\segment;

use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\{Type};

class BonusTypeType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Тип бонуса',
            'fields' => fn() => [
                'id' => Type::int(),
                'alias' => Type::string(),
                'title' => Type::string(),
                'description' => Type::string(),
            ]
        ]);
    }
}
