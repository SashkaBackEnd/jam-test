<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse\list;

use api\models\Warehouse;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\warehouse\InvoiceType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class InvoicesType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список накладных',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(InvoiceType::class)),
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterInvoices',
                    'fields' => [
                        'number' => Type::int(),
                        'fio' => Type::string(),
                        'phone' => Type::string(),
                        'storekeeper_login' => Type::string(),
                        'storekeeper_fio' => Type::string(),
                        'status_id' => Type::int(),
                        'type_id' => Type::int(),
                        'date_created' => Type::string(),
                    ]
                ]),
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function (Warehouse $model, array $args) {
                $query = $model->getInvoices();

                if (isset($args['filter'])) {
                    $filter = $args['filter'];

                    (isset($filter['number'])) and $query->byNumber((int)$filter['number']);
                    (isset($filter['fio'])) and $query->byNumber((int)$filter['number']);
                }

                $query->limit($args['limit'] ?? null);
                $query->offset($args['offset'] ?? null);

                return $query->getArrayEntity();
            }
        ]);
    }
}
