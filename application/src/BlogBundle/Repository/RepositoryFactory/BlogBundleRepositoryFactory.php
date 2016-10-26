<?php

namespace BlogBundle\Repository\RepositoryFactory;

use BlogBundle\Repository\BlogRatingRepository;
use BlogBundle\Repository\CommentRatingRepository;
use BlogBundle\Repository\CommentRepository;
use BlogBundle\Repository\BlogRepository;
use BlogBundle\Repository\ImageRepository;
use BlogBundle\Repository\PostRatingRepository;
use BlogBundle\Repository\PostRepository;
use BlogBundle\Repository\UserProfileRepository;
use BlogBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class BlogBundleRepositoryFactory
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * BlogBundleRepositoryFactory constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return BlogRepository
     */
    public function createBlogRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:Blog");
    }

    /**
     * @return BlogRatingRepository
     */
    public function createBlogRatingRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:BlogRating");
    }

    /**
     * @return CommentRepository
     */
    public function createCommentRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:Comment");
    }

    /**
     * @return CommentRatingRepository
     */
    public function createCommentRatingRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:CommentRating");
    }
    /**
     * @return ImageRepository
     */
    public function createImageRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:Image");
    }

    /**
     * @return PostRepository
     */
    public function createPostRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:Post");
    }

    /**
     * @return PostRatingRepository
     */
    public function createPostRatingRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:PostRating");
    }

    /**
     * @return UserRepository
     */
    public function createUserRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:User");
    }

    /**
     * @return UserProfileRepository
     */
    public function createUserProfileRepository()
    {
        return $this->entityManager->getRepository("BlogBundle:UserProfile");
    }

}
