<?php

declare(strict_types=1);

namespace api\exceptions;

use api\helpers\StatusCodeHelper;
use Throwable;

final class BadRequestException extends ApplicationException implements IContextableException
{
    protected array $context;

    public function __construct(
        string $message = 'Bad request',
        int $code = StatusCodeHelper::BAD_REQUEST,
        Throwable $previous = null
    ) {
        $this->context = [];
        parent::__construct($code, $message, $code, $previous);
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function setContext(array $context): self
    {
        $this->context = $context;

        return $this;
    }
}
