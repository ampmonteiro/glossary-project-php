<?php
session_start();

require '../app/app.php';

ensure_user_is_authenticated();


$data = [
    'title'  => 'Create Term',
];

$term  = null;
$definition = null;

if (is_post()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);

    if (empty($term) || empty($definition)) {
        # Todo dpl msg
    } else {
        add_term($term, $definition);
        redirect('index.php');
    }
}

view('admin/create', $data);
