<?php

declare(strict_types=1);

namespace api\modules\graphql\errors;

use yii\helpers\ArrayHelper;

class GraphqlCategory
{
    public const CATEGORY_BAD_REQUEST = 400;
    public const CATEGORY_UNAUTHORIZED = 401;
    public const CATEGORY_REQUIRED_PAYMENT = 402;
    public const CATEGORY_FORBIDDEN_HTTP = 403;
    public const CATEGORY_NOT_FOUND = 404;
    public const CATEGORY_UNPROCESSABLE_ENTITY = 422;
    public const CATEGORY_INTERNAL = 500;

    public static $categories = [
        self::CATEGORY_BAD_REQUEST => 'bad_request',
        self::CATEGORY_UNAUTHORIZED => 'unauthorized',
        self::CATEGORY_REQUIRED_PAYMENT => 'required_payment',
        self::CATEGORY_FORBIDDEN_HTTP => 'forbidden_http',
        self::CATEGORY_NOT_FOUND => 'not_found',
        self::CATEGORY_UNPROCESSABLE_ENTITY => 'unprocessable_entity',
        self::CATEGORY_INTERNAL => 'internal',
    ];

    public static function get(int $statusCode): string
    {
        return ArrayHelper::getValue(self::$categories, (string)$statusCode, self::CATEGORY_INTERNAL);
    }
}
