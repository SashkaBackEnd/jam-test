<?php

namespace api\modules\graphql\schema\type\segment;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\finance\FinanceWalletType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class AuthorType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Автор',
            'fields' => fn() => [
                'id' => Type::id(),
                'name' => [
                    'description' => 'Наименование автора',
                    'type' => Type::string(),
                ],
                'kind' => TypeRegistry::get(AuthorKindType::class),
                'username' => [
                    'description' => 'Ник',
                    'type' => Type::string(),
                ],
                'first_name' => [
                    'description' => 'Имя',
                    'type' => Type::string(),
                ],
                'last_name' => [
                    'description' => 'Фамилия',
                    'type' => Type::string(),
                ],
                'second_name' => [
                    'description' => 'Отчество',
                    'type' => Type::string(),
                ],
                'fio' => [
                    'description' => 'ФИО',
                    'type' => Type::string(),
                ],
            ]
        ]);
    }
}
