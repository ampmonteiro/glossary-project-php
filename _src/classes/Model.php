<?php

declare(strict_types=1);

class Model
{
    /**
     *  first visability | static or not | name of fn
     * 
     */

    private static $ds;

    public static function initialize(DataProviderInterface $dataProvider)
    {
        static::$ds = $dataProvider;
    }

    public static function getTerms(): array
    {
        return static::$ds->getTerms();
    }

    public static function getTerm(string $term): array | bool | object
    {
        return static::$ds->getTerm(term: $term);
    }

    public static function searchTerms(string $search): array
    {
        return static::$ds->searchTerms(search: $search);
    }

    public static function addTerm(string $term, string $definition): void
    {
        static::$ds->addTerm(term: $term, definition: $definition);
    }

    public static function updateTerm($originalTerm, $newTerm, $definition): void
    {
        static::$ds->updateTerm(originalTerm: $originalTerm, newTerm: $newTerm, definition: $definition);
    }

    public static function deleteTerm(string $term): void
    {
        static::$ds->deleteTerm(term: $term);
    }
}
