<?php

namespace api\modules\graphql\schema\type\segment\list;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\AttachmentType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class AttachmentsType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список вложений',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(AttachmentType::class)),
            ]
        ]);
    }
}
