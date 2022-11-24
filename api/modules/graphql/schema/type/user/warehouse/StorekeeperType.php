<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse;

use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\Type;

class StorekeeperType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Информация о кладовщике',
            'fields' => fn() => [
                'id' => Type::id(),
                'username' => [
                    'description' => 'Логин',
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
            ],
        ]);
    }
}
