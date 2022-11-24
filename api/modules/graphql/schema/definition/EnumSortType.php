<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\definition;

use api\modules\graphql\schema\ModifiedEnumType;

class EnumSortType extends ModifiedEnumType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Направления сортировки',
            'values' => ['ASC', 'DESC', 'RANDOM']
        ]);
    }
}
