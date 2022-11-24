<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type;

use api\modules\graphql\schema\ModifiedObjectType;
use api\traits\TraitAuthenticate;

class MutationType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'fields' => fn () => []
        ]);
    }
}
