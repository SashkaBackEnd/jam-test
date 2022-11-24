<?php

namespace api\modules\graphql\schema\type\user;

use api\models\User;
use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\{Type};

class SponsorType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Спонсор',
            'fields' => fn() => [
                'id' => Type::id(),
                'username' => [
                    'description' => 'Ник спонсора',
                    'type' => Type::string(),
                ],
                'email' => [
                    'description' => 'Email спонсора',
                    'type' => Type::string(),
                ],
                'first_name' => [
                    'description' => 'Имя спонсора',
                    'type' => Type::string(),
                    'resolve' => function (User $model) {
                        return $model->profileLang->first_name ?? null;
                    }
                ],
                'last_name' => [
                    'description' => 'Фамилия спонсора',
                    'type' => Type::string(),
                    'resolve' => function (User $model) {
                        return $model->profileLang->last_name ?? null;
                    }
                ],
                'second_name' => [
                    'description' => 'Отчество спонсора',
                    'type' => Type::string(),
                    'resolve' => function (User $model) {
                        return $model->profileLang->second_name ?? null;
                    }
                ],
            ]
        ]);
    }
}
