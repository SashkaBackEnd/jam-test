<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\finance;

use api\exceptions\IContextableException;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\AuthorType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class FinanceTransactionType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Финансовые операции',
            'fields' => fn() => [
                'id' => Type::id(),
                'to' => [
                    'description' => 'Кому',
                    'type' => TypeRegistry::get(AuthorType::class),
                ],
                'from' => [
                    'description' => 'От кого',
                    'type' => TypeRegistry::get(AuthorType::class),
                ],
                'amount' => [
                    'description' => 'Сумма операции',
                    'type' => Type::float(),
                ],
                'date_open' => [
                    'description' => 'Дата открытия операции',
                    'type' => Type::string(),
                ],
                'date_closed' => [
                    'description' => 'Дата проведения операции',
                    'type' => Type::string(),
                ],
                'date_decline' => [
                    'description' => 'Дата отлонения операции',
                    'type' => Type::string(),
                ],
                'currency_alias' => [
                    'description' => 'Валюта',
                    'type' => Type::string(),
                ],
                'status' => TypeRegistry::get(FinanceTransactionStatusType::class),
                'spec' => TypeRegistry::get(FinanceTransactionSpecType::class),
            ],
        ]);
    }
}
