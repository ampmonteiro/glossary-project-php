<?php

declare(strict_types=1);

function get_terms(bool $assoc = false): array
{
    $json = get_data();

    return  json_decode($json, $assoc);
}

// using union types in return value, PHP 8 feature
function get_term(string $term): object | bool
{
    $terms = get_terms();
    foreach ($terms as $item) {

        if ($item->term == $term) {
            return $item;
        }
    }

    return false;
}

function update_term(string $original_term, string $new_term, string $definition): void
{
    $terms = get_terms();

    foreach ($terms as $item) {

        if ($item->term == $original_term) {
            $item->term = $new_term;
            $item->definition = $definition;
            break;
        }
    }

    set_data($terms);
}


function search_terms(string $search): array
{
    $terms = get_terms();

    $results = array_filter($terms, function ($item) use ($search) {

        if (
            strpos($item->term, $search) !== false ||
            strpos($item->definition, $search) !== false
        ) {
            return  $item;
        }
    });

    return $results;
}


function add_term(string $term, string $definition): void
{
    $items = get_terms();

    $ar = [
        'term' => $term,
        'definition' => $definition
    ];

    $obj = (object) $ar;

    $items[] = $obj;

    set_data($items);
}


function delete_term(string $term): void
{
    $terms = get_terms();

    /* 
    my note: 
        this should not use in indexed array 
        only in assoc array
    
    */

    for ($i = 0; $i < count($terms); $i++) {
        if ($terms[$i]->term === $term) {

            unset($terms[$i]);
            break;
        }
    }

    /*     
    note: 
        because of unset, you need to create new indexed array
        with correted sequence index values 
    */

    $items = array_values($terms);

    set_data($items);
}

function get_data(): string
{

    $fname = CONFIG['data_file'];

    $json = '';

    if (!file_exists($fname)) {
        file_put_contents($fname, '');
    } else {
        $json = file_get_contents($fname);
    }

    return $json;
}


function set_data(array $ar): void
{
    $fname = CONFIG['data_file'];

    $json = json_encode($ar);

    file_put_contents($fname, $json);
}
