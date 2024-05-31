<?php

declare(strict_types=1);

namespace EasyBell\Shared\Domain\ValueObject;

abstract class FloatValue
{
    public function __construct(protected float $value) {}

    final public function value(): float
    {
        return $this->value;
    }
}