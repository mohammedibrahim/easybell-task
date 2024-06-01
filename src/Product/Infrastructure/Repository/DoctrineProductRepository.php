<?php

declare(strict_types=1);

namespace EasyBell\Product\Infrastructure\Repository;

use Doctrine\ORM\EntityManager;
use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\ProductId;
use EasyBell\Shared\Domain\Collection\CollectionContract;
use EasyBell\Shared\Domain\Criteria\Criteria;
use EasyBell\Shared\Infrastructure\Collection\Collection;
use EasyBell\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use EasyBell\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class DoctrineProductRepository extends DoctrineRepository implements ProductRepositoryContract
{
    public function __construct(
        EntityManager $entityManager,
    ) {
        parent::__construct($entityManager);
    }

    public function get(ProductId $productId): ?Product
    {
        return $this->repository(Product::class)->find($productId);
    }

    /**
     * @return CollectionContract<int, Product>
     */
    public function list(): CollectionContract
    {
        $result = $this->repository(Product::class)->findAll();

        return new Collection($result);
    }

    public function create(Product $product): void
    {
        $this->persist($product);
    }

    public function filter(Criteria $criteria): CollectionContract
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria);

        $result = $this->repository(Product::class)->matching($doctrineCriteria)->toArray();

        return new Collection($result);
    }
}
