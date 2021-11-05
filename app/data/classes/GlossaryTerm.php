<?php

declare(strict_types=1);

class GlossaryTerm
{
    public int $id;
    public string $term;
    public string $definition;

    // apply php 8 feature promoting class properties on source prop
    // not work with PDO
    // function __construct(
    //     public int $id,
    //     public string $term,
    //     public string $definition
    // ) {
    // }
}
