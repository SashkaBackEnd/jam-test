<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\User;
use api\models\Warehouse;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\CityType;
use api\modules\graphql\schema\type\segment\CountryType;
use api\modules\graphql\schema\type\segment\RegionType;
use api\modules\graphql\schema\type\user\warehouse\list\InvoicesType;
use api\modules\graphql\schema\type\user\warehouse\InvoiceType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class WarehouseType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Склад',
            'fields' => fn() => [
                'id' => Type::id(),
                'number' => [
                    'description' => 'Номер склада',
                    'type' => Type::int(),
                ],
                'balance' => [
                    'description' => 'Баланс',
                    'type' => Type::float(),
                ],
                'phone' => [
                    'description' => 'Телефон',
                    'type' => Type::string(),
                ],
                'email' => [
                    'description' => 'Почта',
                    'type' => Type::string(),
                ],
                'skype' => [
                    'description' => 'Skype',
                    'type' => Type::string(),
                ],
                'name' => [
                    'description' => 'Название склада',
                    'type' => Type::string(),
                ],
                'address' => [
                    'description' => 'Адрес склада',
                    'type' => Type::string(),
                ],
                'info' => [
                    'description' => 'График работы',
                    'type' => Type::string(),
                ],
                'country' => [
                    'type' => TypeRegistry::get(CountryType::class),
                    'resolve' => function (Warehouse $model) {
                        return $model->country ?? null;
                    }
                ],
                'region' => [
                    'type' => TypeRegistry::get(RegionType::class),
                    'resolve' => function (Warehouse $model) {
                        return $model->region ?? null;
                    }
                ],
                'city' => [
                    'type' => TypeRegistry::get(CityType::class),
                    'resolve' => function (Warehouse $model) {
                        return $model->city ?? null;
                    }
                ],
                'invoice' => [
                    'type' => TypeRegistry::get(InvoiceType::class),
                    'args' => [
                        'filter' => Type::nonNull(
                            new InputObjectType([
                                'name' => 'FilterInvoice',
                                'fields' => [
                                    'id' => Type::nonNull(Type::id()),
                                ]
                            ])
                        ),
                    ],
                    'resolve' => function (Warehouse $model, array $args) {
                        return $model->getInvoice()->byId((int)$args['filter']['id'])->one();
                    }
                ],
                'invoices' => TypeRegistry::get(InvoicesType::class)->getConfig(),
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->warehouse ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
