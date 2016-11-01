<?php

namespace BlogBundle\Criteria;

use Doctrine\ORM\QueryBuilder;

class AppliedCriteriaResult
{
    /**
     * @var QueryBuilder
     */
    private $qb;

    /**
     * AppliedCriteriaResult constructor.
     *
     * @param QueryBuilder $qb
     */
    public function __construct(QueryBuilder $qb)
    {
        $this->qb = $qb;
    }

    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder(): QueryBuilder
    {
        return $this->qb;
    }

    public function getResult()
    {
        return $this->qb;
    }
}