<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\finance;

use api\exceptions\IContextableException;
use api\models\user\Transaction;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\AuthorType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class FinanceTransactionStatusType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Статус операции',
            'fields' => fn() => [
                'id' => Type::id(),
                'alias' => [
                    'description' => 'Псевдоним статуса',
                    'type' => Type::string(),
                ],
                'title' => [
                    'description' => 'Описание статуса',
                    'type' => Type::string(),
                ],
            ],
            'resolve' => function (Transaction $model) {
                try {
                    return $model->getStatus()->one();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
