<?php

require 'app/app.php';

$view_bag = [
    'title'  => 'Glossary List',
    'heading' => 'Glossary'
];

$items = [];

if (isset($_GET['search'])) {
    #$items = search_terms($_GET['search']);
    $items = Data::search_terms($_GET['search']);
    $view_bag['heading'] = "search result for: " . $_GET['search'];
} else {

    #$items = get_terms();
    $items = Data::get_terms();
}

view('index', $items);
