<?php

declare(strict_types=1);

namespace App;

use App\Contracts\CollectionContract;
use Illuminate\Support\Collection as IlluminateCollection;

class Collection extends IlluminateCollection implements CollectionContract
{
    public function filterItems(?callable $callback = null): CollectionContract
    {
        return parent::filter($callback);
    }

    /**
     * @param string[] $keys
     *
     * @return CollectionContract<int, mixed>
     */
    public function removeItem(array $keys): CollectionContract
    {
        return parent::delete($keys);
    }

    /**
     * @return CollectionContract<int, mixed>
     */
    public function addItem(mixed $item): CollectionContract
    {
        return parent::add($item);
    }

    public function mapItem(callable $callback): mixed
    {
        return parent::map($callback);
    }

    public function firstItem(?callable $callback = null, mixed $default = null): mixed
    {
        return parent::first($callback, $default);
    }
}
