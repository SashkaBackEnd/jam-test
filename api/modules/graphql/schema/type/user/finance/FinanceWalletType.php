<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\finance;

use api\exceptions\IContextableException;
use api\models\user\Wallet;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\finance\list\FinanceTransactionsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class FinanceWalletType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Кошелек',
            'fields' => fn() => [
                'id' => Type::id(),
                'debit' => [
                    'description' => 'Баланс debit',
                    'type' => Type::float(),
                ],
                'credit' => [
                    'description' => 'Баланс credit',
                    'type' => Type::float(),
                ],
                'balance' => [
                    'description' => 'Баланс',
                    'type' => Type::float(),
                ],
//                'credit_unapproved' => [
//                    'description' => 'Баланс',
//                    'type' => Type::float(),
//                ],
//                'balance_unapproved' => [
//                    'description' => 'Баланс',
//                    'type' => Type::float(),
//                ],
//                'balance_blocked' => [
//                    'description' => 'Баланс',
//                    'type' => Type::float(),
//                ],
                'currency_alias' => [
                    'description' => 'Валюта',
                    'type' => Type::string(),
                ],
                'operations' => [
                    'type' => TypeRegistry::get(FinanceTransactionsType::class),
                    'resolve' => function (Wallet $model) {
                        return $model->getOperations()->getArrayEntity() ?? null;
                    }
                ],

            ],
            'resolve' => function ($model) {
                try {
                    return $model['bonus'];
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
