<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\list\PartnersType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class PartnerType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Партнер',
            'fields' => fn() => [
                'id' => Type::id(),
                'username' => [
                    'description' => 'Логин',
                    'type' => Type::string(),
                ],
                'email' => [
                    'description' => 'Email',
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
                'phone' => [
                    'description' => 'Мобильный телефон',
                    'type' => Type::string(),
                    'resolve' => function (User $model) {
                        return $model->profile->phone ?? null;
                    }
                ],
                'date_registration' => [
                    'description' => 'Дата/время регистрации',
                    'type' => Type::string(),
                    'resolve' => function (User $model) {
                        return $model->created_at ?? null;
                    }
                ],
                'activity' => TypeRegistry::get(LastActivityType::class)->getConfig(),
                'package' => TypeRegistry::get(PackageType::class)->getConfig(),
                'children' => TypeRegistry::get(PartnersType::class)->getConfig(),
                'sponsor' => [
                    'type' => TypeRegistry::get(SponsorType::class),
                    'resolve' => function (User $model) {
                        return $model->profile->sponsor ?? null;
                    }
                ],
                'statistic' => TypeRegistry::get(StatisticType::class)->getConfig(),
            ],
            'resolve' => function ($model) {
                try {
                    return $model;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
