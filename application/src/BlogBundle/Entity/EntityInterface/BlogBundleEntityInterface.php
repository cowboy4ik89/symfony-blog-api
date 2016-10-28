<?php

namespace BlogBundle\Entity\EntityInterface;

/**
 * Interface BlogBundleEntityInterface
 * @package BlogBundle\Entity\EntityInterface
 */
interface BlogBundleEntityInterface extends EventableEntityInterface
{

    /**
     * @return string|null
     */
    public function getId();

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @param \DateTime $dateTime
     *
     * @return BlogBundleEntityInterface
     */
    public function setCreatedAt(\DateTime $dateTime): BlogBundleEntityInterface;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime;

    /**
     * @param \DateTime $dateTime
     *
     * @return BlogBundleEntityInterface
     */
    public function setUpdatedAt(\DateTime $dateTime): BlogBundleEntityInterface;
}