<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\lottery;

use api\exceptions\IContextableException;
use api\models\user\Lottery;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\lottery\list\LotteryTicketsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class LotteryGroupType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Группа билетов',
            'fields' => fn() => [
                'id' => Type::id(),
                'type' => Type::int(),
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
        ]);
    }
}