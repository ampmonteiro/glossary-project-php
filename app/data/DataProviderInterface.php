<?php

declare(strict_types=1);

# not  using for now
// require 'glossaryterm.class.php';

interface DataProviderInterface
{
    public function getTerms(): array;

    // using union types in return value, PHP 8 feature
    public function getTerm(string $term): array | bool | object;

    public function updateTerm(string | int $originaTerm, string $newTerm, string $definition): void;

    public function searchTerms(string $search): array | object | bool;

    public function addTerm(string $term, string $definition): void;
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
