<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\user\Lottery;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\lottery\list\LotteryTicketsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class LotteryType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Лотерея',
            'fields' => fn() => [
                'id' => ['type' => Type::id(), 'resolve' => fn() => 'lottery'],
                'tickets' => [
                    'type' => TypeRegistry::get(LotteryTicketsType::class),
                    'resolve' => function (Lottery $model) {
                        try {
                            return $model->getLotteryTickets()->getArrayEntity();
                        } catch (IContextableException $e) {
                            throw new GraphqlError($e);
                        }
                    }
                ],
            ],
            'resolve' => function (User $model) {
                try {
                    return Lottery::findOne($model->id);
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
