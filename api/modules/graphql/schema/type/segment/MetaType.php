<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\segment;

use api\modules\graphql\schema\ModifiedObjectType;
use common\domain\entity\ArrayEntity;
use GraphQL\Type\Definition\{Type};

class MetaType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Информация о массовой выборки',
            'fields' => fn() => [
                'count' => Type::int(),
                'limit' => Type::int(),
                'offset' => Type::int(),
                'has_previous_page' => Type::boolean(),
                'has_next_page' => Type::boolean(),
            ],
            'resolve' => function (ArrayEntity $model) {
                return $model->getMeta();
            }
        ]);
    }
}
