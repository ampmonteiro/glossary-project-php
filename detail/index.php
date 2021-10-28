<?php

declare(strict_types=1);

session_start();

require '../app/app.php';

$data = [
    'title' => 'Detail for: '
];

if (!isset($_GET['term'])) {
    redirect('index.php');
}

$data['item'] = get_term($_GET['term']); // TODO: nedd validation

if ($data['item'] === false) {
    view('not_found');
    die();
}


view('detail', $data);
