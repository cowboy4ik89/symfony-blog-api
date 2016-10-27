<?php

namespace BlogBundle\Entity\EntityRepository;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;

/**
 * Interface RepositoryInterface
 * @package BlogBundle\Entity\EntityRepository
 */
interface RepositoryInterface
{
    /**
     * @param BlogBundleEntityInterface $entity
     *
     * @return BlogBundleEntityInterface
     */
    public function save(BlogBundleEntityInterface $entity) : BlogBundleEntityInterface;

    /**
     * @param BlogBundleEntityInterface $entity
     */
    public function remove(BlogBundleEntityInterface $entity);
}
