<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\list;

use api\exceptions\IContextableException;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\BonusType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class BonusesType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Бонусы пользователя за период',
            'fields' => fn() => [
                'all' => Type::listOf(TypeRegistry::get(BonusType::class)),
                'month' => Type::listOf(TypeRegistry::get(BonusType::class)),
            ],
            'resolve' => function ($model) {
                try {
                    return [
                        'all' => $model->getBonusAll(),
                        'month' => $model->getBonusMonth(),
                    ];
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
