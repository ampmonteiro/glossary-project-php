<?php

declare(strict_types=1);

class GlossaryTerm
{
    // apply php 8 feature promoting class properties on source prop
    function __construct(public string $term,  public string $definition)
    {
    }
}
