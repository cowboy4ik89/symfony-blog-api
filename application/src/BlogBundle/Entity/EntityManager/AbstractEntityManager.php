<?php

namespace BlogBundle\Entity\EntityManager;

use BlogBundle\Entity\EntityEventManager;
use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Entity\EntityRepository\RepositoryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractEntityManager
 * @package BlogBundle\Entity\EntityManager
 */
abstract class AbstractEntityManager
{
    /**
     * @var EntityRepository
     */
    private $doctrineRepository;

    /**
     * @var EntityEventManager
     */
    private $entityEventManager;

    /**
     * AbstractEntityManager constructor.
     *
     * @param RepositoryInterface $doctrineRepository
     * @param EntityEventManager  $entityEventManager
     */
    public function __construct(
        RepositoryInterface $doctrineRepository,
        EntityEventManager $entityEventManager
    ) {
        $this->doctrineRepository = $doctrineRepository;
        $this->entityEventManager = $entityEventManager;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     *
     * @return BlogBundleEntityInterface
     */
    public function save(BlogBundleEntityInterface $entity): BlogBundleEntityInterface
    {
        $isNew = (bool)$entity->getId();

        $entity = $this->doctrineRepository->save($entity);

        $isNew ?
            $this->entityEventManager->dispatchEntityUpdatedEvent($entity):
            $this->entityEventManager->dispatchEntityUpdatedEvent($entity);

        return $entity;

    }

    /**
     * @param BlogBundleEntityInterface $entity
     */
    public function remove(BlogBundleEntityInterface $entity)
    {
        $this->doctrineRepository->remove($entity);
        $this->entityEventManager->dispatchEntityDeletedEvent($entity);
    }

    /**
     * Finds an object by its primary key / identifier.
     *
     * @param mixed $id The identifier.
     *
     * @return object The object.
     */
    public function find($id)
    {
        return $this->doctrineRepository->find($id);
    }

    /**
     * Finds all objects in the repository.
     *
     * @return array The objects.
     */
    public function findAll()
    {
        return $this->doctrineRepository->findAll();
    }

    /**
     * Finds objects by a set of criteria.
     *
     * Optionally sorting and limiting details can be passed. An implementation may throw
     * an UnexpectedValueException if certain values of the sorting or limiting details are
     * not supported.
     *
     * @param array      $criteria
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return array The objects.
     *
     * @throws \UnexpectedValueException
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->doctrineRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Finds a single object by a set of criteria.
     *
     * @param array $criteria The criteria.
     *
     * @return object The object.
     */
    public function findOneBy(array $criteria)
    {
        return $this->doctrineRepository->findOneBy($criteria);
    }

}
