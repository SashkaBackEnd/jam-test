<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\Profile;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\traits\TraitAuthenticate;
use GraphQL\Type\Definition\Type;

class ProfileLangType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'description' => 'Раздел пользователя',
            'fields' => fn() => [
                'id' => Type::id(),
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
                'address' => [
                    'description' => 'Адрес регистрации',
                    'type' => Type::string(),
                ],
            ],
            'resolve' => function (Profile $model) {
                try {
                    return $model->lang ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
