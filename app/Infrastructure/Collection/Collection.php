<?php

declare(strict_types=1);

namespace App\Infrastructure\Collection;

use App\Domain\Contracts\CollectionContract;
use Illuminate\Support\Collection as IlluminateCollection;

class Collection implements CollectionContract, \IteratorAggregate
{
    protected IlluminateCollection $laravelCollection;

    /**
     * @param array<\Iterator> $items
     */
    public function __construct(array $items = [])
    {
        $this->laravelCollection = new IlluminateCollection($items);
    }

    public function filterItems(?callable $callback = null): CollectionContract
    {
        return new self($this->laravelCollection->filter($callback)->toArray());
    }

    /**
     * @param string[] $keys
     *
     * @return CollectionContract<int, mixed>
     */
    public function removeItems(array $keys): CollectionContract
    {
        return new self($this->laravelCollection->forget($keys)->toArray());
    }

    /**
     * @return CollectionContract<int, mixed>
     */
    public function addItem(mixed $item): CollectionContract
    {
        return new self($this->laravelCollection->add($item)->toArray());
    }

    /**
     * @return CollectionContract<int, mixed>
     */
    public function mapItem(callable $callback): CollectionContract
    {
        return new self($this->laravelCollection->map($callback)->toArray());
    }

    public function firstItem(?callable $callback = null, mixed $default = null): mixed
    {
        return $this->laravelCollection->first($callback, $default);
    }

    public function getIterator(): \Traversable
    {
        return $this->laravelCollection->getIterator();
    }
}
