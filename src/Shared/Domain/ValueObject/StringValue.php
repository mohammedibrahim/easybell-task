<?php

namespace EasyBell\Shared\Domain\ValueObject;

abstract class StringValue
{
    public function __construct(protected string $value) {}

    final public function value(): string
    {
        return $this->value;
    }
}

