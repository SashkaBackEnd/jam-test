<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\list;

use api\modules\graphql\schema\ModifiedObjectType;
use common\domain\entity\ArrayEntity;
use GraphQL\Type\Definition\Type;

class OrdersInfoType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Информация о заказах',
            'fields' => fn() => [
                'id' => ['type' => Type::id(), 'resolve' => fn() => 'orders_info'],
                'sum_user_price' => [
                    'description' => 'Общая сумма заказов в PV',
                    'type' => Type::float(),
                ],
                'sum_total_price' => [
                    'description' => 'Общая сумма заказов в PV',
                    'type' => Type::float(),
                ],
            ],
            'resolve' => function (?ArrayEntity $model) {
                return $model->getInfo() ?? null;
            }
        ]);
    }
}
