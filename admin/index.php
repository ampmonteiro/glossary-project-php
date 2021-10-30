<?php

session_start();

require '../app/app.php';

ensure_user_is_authenticated();

$view_bag = [
    'title'  => 'Glossary Admin List',
];

// $items = [];

// if (isset($_GET['search'])) {
//     $items = search_terms($_GET['search']);
//     $view_bag['heading'] = "search result for: " . $_GET['search'];
// } else {

//     $items = get_terms();
// }

view('admin/index', Data::get_terms());
