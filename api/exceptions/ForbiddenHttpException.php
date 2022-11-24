<?php

declare(strict_types=1);

namespace api\exceptions;

use api\helpers\StatusCodeHelper;
use Throwable;

final class ForbiddenHttpException extends ApplicationException implements IContextableException
{
    protected array $context;

    public function __construct(
        string $message = 'Forbidden Http',
        int $code = StatusCodeHelper::FORBIDDEN_HTTP,
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
