<?php

declare(strict_types=1);

namespace EasyBell\Shared\Domain\Collection\Contracts;

interface CollectionContract extends \Traversable
{
    /**
     * @return CollectionContract<int, mixed>
     */
    public function filterItems(?callable $callback = null): self;

    /**
     * @param string[] $keys
     *
     * @return CollectionContract<int, mixed>
     */
    public function removeItems(array $keys): self;

    /**
     * @return CollectionContract<int, mixed>
     */
    public function addItem(mixed $item): self;

    /**
     * @return CollectionContract<int, mixed>
     */
    public function mapItem(callable $callback): self;

    public function firstItem(?callable $callback = null, mixed $default = null): mixed;

    public function toArray(): array;
}
