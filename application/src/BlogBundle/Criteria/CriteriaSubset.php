<?php

namespace BlogBundle\Criteria;

use Doctrine\ORM\QueryBuilder;

class CriteriaSubset
{

    public function getSearchCriteria(): SearchCriteria
    {

    }

    public function getFilterCriteria(): FilterCriteria
    {

    }

    public function getSortingCriteria(): SortingCriteria
    {

    }

    public function getPaginationCriteria(): PaginationCriteria
    {

    }

    public function applyCriteriaSubset(QueryBuilder $qb)
    {
        $appliedCriteriaResult = new AppliedCriteriaResult($qb);

        $this
            ->getSearchCriteria()
            ->applyCriteria($appliedCriteriaResult);

        $this
            ->getFilterCriteria()
            ->applyCriteria($appliedCriteriaResult);

        $this
            ->getSortingCriteria()
            ->applyCriteria($appliedCriteriaResult);

        $this
            ->getPaginationCriteria()
            ->applyCriteria($appliedCriteriaResult);

        return $appliedCriteriaResult->getResult();
    }
}
