<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\list;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\MessageType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class MessagesType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список сообщений',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(MessageType::class)),
            ],
        ]);
    }
}
