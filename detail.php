<?php

declare(strict_types=1);

require 'app/app.php';


if (!isset($_GET['term'])) {
    redirect('index.php');
}

$data = get_term($_GET['term']); // TODO: nedd validation

if ($data === false) {
    view('not_found');
    die();
}

$view_bag = [
    'title' => 'Detail for: ' . $data->term
];

view('detail', $data);
