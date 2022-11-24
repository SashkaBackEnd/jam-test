<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\lottery;

use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\Type;

class LotteryTicketType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Лотерея',
            'fields' => fn() => [
                'id' => Type::id(),
                'type' => Type::int(),
            ],
        ]);
    }
}
