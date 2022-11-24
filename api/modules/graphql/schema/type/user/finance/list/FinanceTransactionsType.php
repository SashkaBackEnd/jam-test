<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\finance\list;

use api\exceptions\IContextableException;
use api\models\user\Finance;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\finance\FinanceTransactionType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class FinanceTransactionsType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список операций по кошельку',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(FinanceTransactionType::class)),
            ],
            'args' => [
//                'filter' => new InputObjectType([
//                    'name' => 'FilterFinanceTransactions',
//                    'fields' => [
//                        'id' => Type::int(),
//                        'username' => Type::string(),
//                        'first_name' => Type::string(),
//                        'last_name' => Type::string(),
//                        'second_name' => Type::string(),
//                    ]
//                ]),
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function (Finance $model, array $args) {
                try {
                    $query = $model->getTransactions();

                    $query->limit($args['limit'] ?? null);
                    $query->offset($args['offset'] ?? null);

                    return $query->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
