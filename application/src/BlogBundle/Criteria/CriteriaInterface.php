<?php

namespace BlogBundle\Criteria;

use Doctrine\ORM\QueryBuilder;

/**
 * Interface CriteriaInterface
 * @package BlogBundle\Criteria
 */
interface CriteriaInterface
{
    /**
     * @param QueryBuilder $qb
     *
     * @return AppliedCriteriaResult
     */
    public function applyCriteria(QueryBuilder $qb): AppliedCriteriaResult;
}