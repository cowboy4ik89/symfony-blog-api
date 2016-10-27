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

}
