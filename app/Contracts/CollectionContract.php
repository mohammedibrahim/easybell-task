<?php

declare(strict_types=1);

namespace App\Contracts;

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
    public function removeItem(array $keys): self;

    /**
     * @return CollectionContract<int, mixed>
     */
    public function addItem(mixed $item): self;

    public function mapItem(callable $callback): mixed;

    public function firstItem(?callable $callback = null, mixed $default = null): mixed;
}
