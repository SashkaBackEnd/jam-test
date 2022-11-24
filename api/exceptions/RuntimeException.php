<?php

declare(strict_types=1);

namespace api\exceptions;

use api\helpers\StatusCodeHelper;
use Throwable;

final class RuntimeException extends ApplicationException implements IContextableException
{
    protected array $context;

    public function __construct(
        string $message = 'An error during script execution',
        int $code = StatusCodeHelper::INTERNAL_SERVER_ERROR,
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
