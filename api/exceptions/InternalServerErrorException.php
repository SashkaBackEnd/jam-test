<?php

declare(strict_types=1);

namespace api\exceptions;

use Throwable;

final class InternalServerErrorException extends ApplicationException implements IContextableException
{
    protected array $context;

    public function __construct(
        string $message = 'Unexpected error occurred',
        int $code = 500,
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
