<?php

namespace api\modules\graphql\schema\type\segment\list;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\segment\SexType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class SexesType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список полов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(SexType::class)),
            ]
        ]);
    }
}
