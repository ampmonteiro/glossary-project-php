<?php

function get_terms($ar = false)
{
    $json = get_data();

    return  json_decode($json, $ar);
}

function get_term($term)
{
    $terms = get_terms();
    foreach ($terms as $item) {

        if ($item->term == $term) {
            return $item;
        }
    }

    return false;
}

function update_term($original_term, $new_term, $definition)
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


function search_terms($search)
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


function add_term($term, $definition)
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


function delete_term($term)
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

function get_data()
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


function set_data($ar)
{
    $fname = CONFIG['data_file'];

    $json = json_encode($ar);

    file_put_contents($fname, $json);
}
