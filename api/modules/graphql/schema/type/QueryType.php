<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\TypeRegistry;
use api\traits\TraitAuthenticate;

class QueryType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'description' => 'Корневой элемент GraphQL-запросов.',
            'fields' => fn() => [
                'content' => TypeRegistry::get(ContentType::class)->getConfig(),
                'segment' => TypeRegistry::get(SegmentType::class)->getConfig(),
                'user' => TypeRegistry::get(UserType::class)->getConfig(),
                'info' => TypeRegistry::get(InfoType::class)->getConfig(),
            ]
        ]);
    }
}
