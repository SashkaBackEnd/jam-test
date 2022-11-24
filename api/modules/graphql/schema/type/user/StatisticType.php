<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\Type;

class StatisticType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Реферал',
            'fields' => fn() => [
                'all' => [
                    'description' => 'Общее число юзеров',
                    'type' => Type::int(),
                ],
                'registry' => [
                    'description' => 'Зарегистрированные пользователи',
                    'type' => Type::int(),
                ],
                'buy_start_package' => [
                    'description' => 'Оплатили стартовый пакет',
                    'type' => Type::int(),
                ],
                'activity_complete' => [
                    'description' => 'Выполнили активность',
                    'type' => Type::int(),
                ],
                'activity_false' => [
                    'description' => 'Неактивные',
                    'type' => Type::int(),
                ],
                'buy_biz_package' => [
                    'description' => 'Оплатили бизнес-место',
                    'type' => Type::int(),
                ],
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->getStatistic()->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
