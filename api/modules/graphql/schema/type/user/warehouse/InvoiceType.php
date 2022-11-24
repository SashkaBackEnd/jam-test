<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse;

use api\exceptions\IContextableException;
use api\models\Invoice;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\OrderType;
use api\modules\graphql\schema\type\user\warehouse\list\InvoiceItemsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class InvoiceType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Накладная',
            'fields' => fn() => [
                'id' => Type::id(),
                'number' => [
                    'description' => 'Номер накладной',
                    'type' => Type::int(),
                ],
                'fio' => [
                    'description' => 'ФИО',
                    'type' => Type::string(),
                    'resolve' => function (Invoice $model) {
                        return $model->to->fio ?? null;
                    }
                ],
//                'phone' => [
//                    'description' => 'Телефон',
//                    'type' => Type::string(),
//                ],
//                'email' => [
//                    'description' => 'Email',
//                    'type' => Type::string(),
//                ],
//                'skype' => [
//                    'description' => 'Телефон',
//                    'type' => Type::string(),
//                ],
//                'name' => [
//                    'description' => 'Склад отправитель',
//                    'type' => Type::string(),
//                ],
//                'address' => [
//                    'description' => 'Склад получатель',
//                    'type' => Type::string(),
//                ],
                'date' => [
                    'description' => 'Дата создания',
                    'type' => Type::string(),
                ],
                'track_number' => [
                    'description' => 'Трек-номер',
                    'type' => Type::id(),
                ],
                'amount' => [
                    'description' => 'Сумма накладной',
                    'type' => Type::string(),
                ],
                'delivery_price' => [
                    'description' => 'Стоимость доставки, PV',
                    'type' => Type::string(),
                ],
                'cost' => [
                    'description' => 'Стоимость',
                    'type' => Type::string(),
                ],
                'notes' => [
                    'description' => 'Примечание',
                    'type' => Type::string(),
                ],
                'status' => [
                    'type' => TypeRegistry::get(InvoiceStatusType::class),
                    'resolve' => function (Invoice $model) {
                        return $model->status ?? null;
                    }
                ],
                'type' => [
                    'type' => TypeRegistry::get(InvoiceTypeType::class),
                    'resolve' => function (Invoice $model) {
                        return $model->type ?? null;
                    }
                ],
                'storekeeper' => [
                    'type' => TypeRegistry::get(StorekeeperType::class),
                    'resolve' => function (Invoice $model) {
                        return $model->getStorekeeper()->one() ?? null;
                    }
                ],
                'items' => TypeRegistry::get(InvoiceItemsType::class)->getConfig(),
                'order' => [
                    'type' => TypeRegistry::get(OrderType::class),
                    'resolve' => function (Invoice $model) {
                        return $model->getOrder()->one() ?? null;
                    }
                ],
            ],
            'resolve' => function (Invoice $model) {
                try {
                    return $model->getOrders()->getArrayEntity() ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
