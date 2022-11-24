<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\Type;

class LastActivityType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Активность пользователя',
            'fields' => fn() => [
                'id' => Type::id(),
                'status' => [
                    'description' => 'Активность',
                    'type' => Type::boolean(),
                ],
                'date_completed' => [
                    'description' => 'До окончания активности (дней)',
                    'type' => Type::int(),
                ],
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->getLastActivity()->one();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
