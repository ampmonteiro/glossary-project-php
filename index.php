<?php

declare(strict_types=1);

session_start();

require 'app/app.php';

$data = [
    'title'  =>  'Glossary List',
    'heading' => 'Glossary'
];

if (isset($_GET['search'])) {
    $data['items']   = Model::searchTerms(search: $_GET['search']);
    $data['heading'] = "search result for: " . $_GET['search'];
} else {

    $data['items'] = Model::getTerms();
}

view(file: 'index', data: $data);
