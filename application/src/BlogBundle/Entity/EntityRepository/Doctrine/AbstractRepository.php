<?php

namespace BlogBundle\Entity\EntityRepository\Doctrine;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Entity\EntityRepository\RepositoryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractRepository
 * @package BlogBundle\Entity\EntityRepository\Doctrine
 */
class AbstractRepository extends EntityRepository implements RepositoryInterface
{

    /**
     * @param BlogBundleEntityInterface $entity
     *
     * @return BlogBundleEntityInterface
     */
    public function save(BlogBundleEntityInterface $entity): BlogBundleEntityInterface
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        return $entity;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     *
     * @return BlogBundleEntityInterface
     */
    public function remove(BlogBundleEntityInterface $entity): BlogBundleEntityInterface
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
}
