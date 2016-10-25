<?php

namespace BlogBundle\Service\EntityManager;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Service\EntityEventManager;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractEntityManager
{
    /**
     * @var string
     */
    protected $repositoryName;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var EntityEventManager
     */
    private $entityEventManager;

    /**
     * @param EntityManagerInterface $entityManager
     * @param EntityEventManager $entityEventManager
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        EntityEventManager $entityEventManager
    ) {
        $this->entityManager = $entityManager;
        $this->entityEventManager = $entityEventManager;
        $this->repository = $entityManager->getRepository($this->repositoryName);
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @return BlogBundleEntityInterface
     */
    public function create(BlogBundleEntityInterface $entity)
    {
        $entity = $this->save($entity);

        $this->entityEventManager->dispatchEntityCreatedEvent($entity);

        return $entity;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @return BlogBundleEntityInterface
     */
    public function update(BlogBundleEntityInterface $entity)
    {
        $entity = $this->save($entity);

        $this->entityEventManager->dispatchEntityUpdatedEvent($entity);

        return $entity;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @return BlogBundleEntityInterface
     */
    public function remove(BlogBundleEntityInterface $entity)
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();

        $this->entityEventManager->dispatchEntityDeletedEvent($entity);
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @return BlogBundleEntityInterface
     */
    private function save($entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }
}
