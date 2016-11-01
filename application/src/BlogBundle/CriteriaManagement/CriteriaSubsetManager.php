<?php

namespace BlogBundle\Criteria;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\HttpFoundation\Request;

class CriteriaSubsetManager
{
    public function createCriteriaSubsetFromHttpRequest(Request $request)
    {
        $criteriaSubsetBuilder = new CriteriaSubsetBuilder();

        $criteriaSubsetBuilder->buildSearchCriteriaFromRequest($request);
        $criteriaSubsetBuilder->buildFilterCriteriaFromRequest($request);
        $criteriaSubsetBuilder->buildSortingCriteriaFromRequest($request);
        $criteriaSubsetBuilder->buildPaginationCriteriaFromRequest($request);

        return $criteriaSubsetBuilder->getCriteriaSubset();
    }

    /**
     * @example
     * @param $request
     */
    public function createCriteriaSubsetFromWebSocketRequest($request)
    {

    }

    /**
     * @example
     * @param $input
     */
    public function createCriteriaSubsetFromCommand(InputInterface $input)
    {

    }
}