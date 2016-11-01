<?php

namespace BlogBundle\Criteria;

class SearchCriteria
{
    /**
     * @var string
     */
    private $term;

    /**
     * @return string
     */
    public function getTerm(): string
    {
        return $this->term;
    }

    /**
     * @param string $term
     */
    public function setTerm(string $term)
    {
        $this->term = $term;
    }
}