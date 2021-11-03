<?php

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

    public static function getTerms()
    {
        return static::$ds->getTerms();
    }

    public static function getTerm($term)
    {
        return static::$ds->getTerm($term);
    }

    public static function searchTerms($search)
    {
        return static::$ds->searchTerms($search);
    }

    public static function addTerm($term, $definition)
    {
        return static::$ds->addTerm($term, $definition);
    }

    public static function updateTerm($originalTerm, $newTerm, $definition)
    {
        return static::$ds->updateTerm($originalTerm, $newTerm, $definition);
    }

    public static function deleteTerm($term)
    {
        return static::$ds->deleteTerm($term);
    }
}
