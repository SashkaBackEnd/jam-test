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

class MessageType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => '',
            'fields' => fn() => [
                'id' => Type::id(),
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
