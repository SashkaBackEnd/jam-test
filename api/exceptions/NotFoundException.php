<?php

declare(strict_types=1);

namespace api\exceptions;

use api\helpers\StatusCodeHelper;
use Throwable;

final class NotFoundException extends ApplicationException implements IContextableException
{
    protected array $context;

    public function __construct(
        string $message = 'Entity not found',
        int $code = StatusCodeHelper::NOT_FOUND,
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
