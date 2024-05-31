<?php

declare(strict_types=1);

namespace EasyBell\Shared\Domain;

use IteratorAggregate;

/** @template-implements IteratorAggregate<mixed>*/
abstract class Collection implements \Countable, \IteratorAggregate
{
    public function __construct(private readonly array $items)
    {
        Assert::arrayOf($this->type(), $items);
    }

    final public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items());
    }

    final public function count(): int
    {
        return count($this->items());
    }

    abstract protected function type(): string;

    protected function items(): array
    {
        return $this->items;
    }
}
