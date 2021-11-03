<?php

declare(strict_types=1);

session_start();

require '../app/app.php';

$data = [
    'title' => 'Detail for: '
];

if (!isset($_GET['term'])) {
    redirect(url: 'index.php');
}

$data['item'] = Model::getTerm(term: $_GET['term']); // TODO: nedd validation

if ($data['item'] === false) {
    view(file: 'not_found');
    die();
}


view(file: 'detail', data: $data);
