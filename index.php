<?php

declare(strict_types=1);

require 'app/app.php';

$data = [
    'title'  =>  'Glossary List',
    'heading' => 'Glossary'
];


if (isset($_GET['search'])) {
    $data['items']   = search_terms($_GET['search']);
    $data['heading'] = "search result for: " . $_GET['search'];
} else {

    $data['items'] = get_terms();
}

view('index', $data);
