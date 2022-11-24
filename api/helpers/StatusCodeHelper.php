<?php

namespace api\helpers;

class StatusCodeHelper
{
    public const OK = 200;
    public const CREATED = 201;

    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN_HTTP = 403;
    public const NOT_FOUND = 404;
    public const UNPROCESSABLE_ENTITY = 422;

    public const INTERNAL_SERVER_ERROR = 500;
}
