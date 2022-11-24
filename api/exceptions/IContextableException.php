<?php

declare(strict_types=1);

namespace api\exceptions;

use Throwable;

/**
 * Интерфейс для исключений, умеющих передавать контекст внутри себя
 */
interface IContextableException extends Throwable
{
    public function getContext(): array;
    public function setContext(array $context): self;
}
