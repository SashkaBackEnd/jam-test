<?php

declare(strict_types=1);

namespace api\exceptions;

use api\helpers\StatusCodeHelper;
use Throwable;

class UnprocessableEntityException extends ApplicationException implements IContextableException
{
    protected array $context;

    public function __construct(
        string $message = 'Unprocessable Entity',
        int $code = StatusCodeHelper::UNPROCESSABLE_ENTITY,
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
