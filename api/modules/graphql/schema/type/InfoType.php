<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type;

use api\exceptions\IContextableException;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\traits\TraitAuthenticate;
use GraphQL\Type\Definition\Type;

class InfoType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Раздел с информацией кабинета',
            'fields' => fn() => [
                'id' => Type::id(),
                'currency_pv_rate' => [
                    'description' => 'Курс 1 PV = рублей',
                    'type' => Type::int(),
                    'resolve' => fn() => 88
                ],
            ],
            'resolve' => function () {
                try {
                    return ['id' => 'info'];
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
