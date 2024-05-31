<?php

declare(strict_types=1);

namespace EasyBell\Shared\Domain\ValueObject;

abstract class IntegerValue
{
    public function __construct(protected int $value) {}

    final public function value(): int
    {
        return $this->value;
    }
}