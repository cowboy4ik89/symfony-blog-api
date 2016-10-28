<?php

namespace BlogBundle\Entity;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;

/**
 * Class AbstractEntity
 * @package BlogBundle\Entity
 */
abstract class AbstractEntity implements BlogBundleEntityInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return BlogBundleEntityInterface
     */
    public function setCreatedAt(\DateTime $dateTime): BlogBundleEntityInterface
    {
        $this->createdAt = $dateTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return BlogBundleEntityInterface
     */
    public function setUpdatedAt(\DateTime $dateTime): BlogBundleEntityInterface
    {
        $this->updatedAt = $dateTime;

        return $this;
    }


    public function setCreatedAtValue()
    {
        if (!$this->createdAt) {
            $this->createdAt = new \DateTime();
        }
    }

    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }
}
