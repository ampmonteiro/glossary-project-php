<?php

declare(strict_types=1);

# not  using for now
// require 'glossaryterm.class.php';

interface DataProviderInterface
{
    public function getTerms(): array;

    // using union types in return value, PHP 8 feature
    public function getTerm(string $term): array | bool;

    public function updateTerm(string $originaTerm, string $newTerm, string $definition): void;

    public function searchTerms(string $search): array;

    public function addTerm(string $term, string $definition): void;

    public function deleteTerm(string $term): void;
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
