<?php

namespace BlogBundle\Service;

class StringFormatter
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function toUnderscoreFormat(string $string): string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $string)), '_');
    }
}
