<?php

declare(strict_types=1);

namespace EasyBell\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\NotSupported;
use EasyBell\Shared\Domain\Aggregate\AggregateRoot;

abstract class DoctrineRepository
{
    public function __construct(private readonly EntityManager $entityManager) {}

    protected function entityManager(): EntityManager
    {
        return $this->entityManager;
    }

    protected function persist(AggregateRoot $entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush();
    }

    protected function remove(AggregateRoot $entity): void
    {
        $this->entityManager()->remove($entity);
        $this->entityManager()->flush();
    }

    /**
     * @template T of object
     *
     * @psalm-param class-string<T> $entityClass
     *
     * @psalm-return EntityRepository<T>
     *
     * @throws NotSupported
     */
    protected function repository(string $entityClass): EntityRepository
    {
        return $this->entityManager()->getRepository($entityClass);
    }
}
