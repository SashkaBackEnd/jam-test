<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\user\Finance;
use api\models\user\Lottery;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\finance\list\FinanceTransactionsType;
use api\modules\graphql\schema\type\user\finance\list\FinanceWalletsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class FinanceType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Финансы',
            'fields' => fn() => [
                'id' => ['type' => Type::id(), 'resolve' => fn() => 'finance'],
                'wallets' => TypeRegistry::get(FinanceWalletsType::class)->getConfig(),
                'transactions' => TypeRegistry::get(FinanceTransactionsType::class)->getConfig(),
            ],
            'resolve' => function (User $model) {
                try {
                    return Finance::findOne($model->id);
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
