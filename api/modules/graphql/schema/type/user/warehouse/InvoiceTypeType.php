<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse;

use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\Type;

class InvoiceTypeType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Тип накладной',
            'fields' => fn() => [
                'id' => Type::id(),
                'alias' => [
                    'description' => 'Алиас',
                    'type' => Type::string(),
                ],
                'name' => [
                    'description' => 'Название',
                    'type' => Type::string(),
                ],
            ],
        ]);
    }
}
