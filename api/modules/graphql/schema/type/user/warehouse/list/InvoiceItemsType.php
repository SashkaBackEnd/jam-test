<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse\list;

use api\models\Invoice;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\warehouse\InvoiceItemType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class InvoiceItemsType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список заказов',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(InvoiceItemType::class)),
            ],
            'args' => [
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function (Invoice $model, array $args) {
                $query = $model->getItems();

                $query->limit($args['limit'] ?? 0);
                $query->offset($args['offset'] ?? 0);

                return $query->getArrayEntity();
            }
        ]);
    }
}
