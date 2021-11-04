<?php

require('glossaryterm.class.php');

# should be a interface  since dont exist methods implemented
# and dont exist um method with business logic shared

class DataProvider
{

    function __construct($source)
    {
        $this->source = $source;
    }

    public function get_terms()
    {
    }

    public function get_term($term)
    {
    }

    public function update_term($original_term, $new_term, $definition)
    {
    }


    public function search_terms($search)
    {
    }


    public function add_term($term, $definition)
    {
    }


    public function delete_term($term)
    {
    }
}
