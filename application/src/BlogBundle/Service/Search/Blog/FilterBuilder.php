<?php

namespace BlogBundle\Service\Search\Blog;

class FilterBuilder
{
    private $filter;

    public function buildFilter(array $requestFilter)
    {
        $this->filter = new Filter();
        $this->buildUserFilter($requestFilter);
    }

    private function buildUserFilter(array $search)
    {
        if (array_key_exists('user', $search)) {
            $this->filter->setUser($search['user']);
        }
    }

}