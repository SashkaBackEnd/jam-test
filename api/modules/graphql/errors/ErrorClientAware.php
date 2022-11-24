<?php

declare(strict_types=1);

namespace api\modules\graphql\errors;

use GraphQL\Error\ClientAware;
use GraphQL\Error\Error;

class ErrorClientAware extends Error implements ClientAware
{
    public function isClientSafe(): bool
    {
        return true;
    }

    public function getCategory()
    {
        return Error::CATEGORY_INTERNAL;
    }
}
