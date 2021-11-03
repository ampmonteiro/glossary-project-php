<?php

# not  using for now
// require 'glossaryterm.class.php';

interface DataProviderInterface
{
    public function getTerms();

    public function getTerm($term);

    public function updateTerm($original_term, $new_term, $definition);

    public function searchTerms($search);

    public function addTerm($term, $definition);
}

// class DataProvider
// {
//     function __construct($source)
//     {
//         $this->source = $source;
//     }

//     public function get_terms()
//     {
//     }

//     // using union types in return value, PHP 8 feature
//     function get_term($term)
//     {
//     }

//     public function update_term($original_term, $new_term, $definition)
//     {
//     }


//     public function search_terms($search)
//     {
//     }


//     public function add_term($term, $definition)
//     {
//     }
// }
