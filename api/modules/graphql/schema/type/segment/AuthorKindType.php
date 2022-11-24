<?php

namespace api\modules\graphql\schema\type\segment;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\finance\FinanceWalletType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class AuthorKindType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Автор',
            'fields' => fn() => [
                'alias' => [
                    'description' => 'Псевдоним типа',
                    'type' => Type::id(),
                ],
                'title' => [
                    'description' => 'Наименование типа',
                    'type' => Type::string(),
                ],
            ]
        ]);
    }
}
