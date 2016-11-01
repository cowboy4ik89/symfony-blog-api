<?php

namespace BlogBundle\Criteria;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class PaginationCriteria
 * @package BlogBundle\Criteria
 */
class PaginationCriteria
{

    /**
     * @var int
     */
    private $page;

    /**
     * @var
     */
    private $perPage;

    /**
     * @return mixed
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;
    }

    public function applyCriteria(AppliedCriteriaResult $appliedCriteriaResult): AppliedCriteriaResult
    {
        $paginator = new Paginator($appliedCriteriaResult->getQueryBuilder());
        $paginator->getQuery()
            ->setFirstResult($this->getPage())
            ->setMaxResults($this->getPerPage());

        return $appliedCriteriaResult;
    }
}
