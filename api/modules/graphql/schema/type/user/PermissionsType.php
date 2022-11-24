<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\user\Permission;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\traits\TraitAuthenticate;
use GraphQL\Type\Definition\Type;

class PermissionsType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'description' => 'Разрешения пользователя',
            'fields' => fn() => [
                'is_buy' => [
                    'description' => 'Возможность покупки',
                    'type' => Type::boolean(),
                    'resolve' => function (Permission $model) {
                        return $model->getIsBuy();
                    }
                ],
                'is_profile_completed' => [
                    'description' => 'Заполненность профиля',
                    'type' => Type::boolean(),
                    'resolve' => function (Permission $model) {
                        return $model->getIsProfileCompleted();
                    }
                ],
                'is_client' => [
                    'description' => 'Роль клиента',
                    'type' => Type::boolean(),
                    'resolve' => function (Permission $model) {
                        return $model->getIsClient();
                    }
                ],
                'is_partner' => [
                    'description' => 'Роль партнера',
                    'type' => Type::boolean(),
                    'resolve' => function (Permission $model) {
                        return $model->getIsPartner();
                    }
                ],
                'is_admin' => [
                    'description' => 'Роль админ',
                    'type' => Type::boolean(),
                    'resolve' => function (Permission $model) {
                        return $model->getIsAdmin();
                    }
                ],
                'is_warehouse' => [
                    'description' => 'Роль кладовщика',
                    'type' => Type::boolean(),
                    'resolve' => function (Permission $model) {
                        return $model->getIsWarehouse();
                    }
                ],
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->permissions ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
