<?php

session_start();

require '../app/app.php';

ensure_user_is_authenticated();

$data = [
    'title'  => 'Glossary Admin List',
    'items'  => Model::getTerms()
];

// $items = [];

// if (isset($_GET['search'])) {
//     $items = search_terms($_GET['search']);
//     $view_bag['heading'] = "search result for: " . $_GET['search'];
// } else {

//     $items = get_terms();
// }

view(file: 'admin/index', data: $data);
