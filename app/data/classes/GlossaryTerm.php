<?php

declare(strict_types=1);

class GlossaryTerm
{
    function __construct($term, $definition)
    {
        $this->term = $term;
        $this->definition = $definition;
    }
}
