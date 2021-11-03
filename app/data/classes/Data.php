<?php

require 'DataProvider.php';

class Data
{
    /**
     *  first visability | static or not | name of fn
     * 
     */

    private static $ds;

    public static function initialize(DataProvider  $data_provider)
    {
        static::$ds = $data_provider;
    }

    public static function get_terms()
    {
        return static::$ds->get_terms();
    }

    public static function get_term($term)
    {
        return static::$ds->get_term($term);
    }

    public static function search_terms($search)
    {
        return static::$ds->search_terms($search);
    }

    public static function add_term($term, $definition)
    {
        return static::$ds->add_term($term, $definition);
    }

    public static function update_term($original_term, $new_term, $definition)
    {
        return static::$ds->update_term($original_term, $new_term, $definition);
    }

    public static function delete_term($term)
    {
        return static::$ds->delete_term($term);
    }
}
