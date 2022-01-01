<?php
session_start();

require '../../_src/app.php';

ensure_user_is_authenticated();

$data = [
    'title'  => 'Create Term',
];

$term  = null;
$definition = null;

if (is_post()) {
    $term = sanitize(value: $_POST['term']);
    $definition = sanitize(value: $_POST['definition']);

    if (empty($term) || empty($definition)) {
        # Todo dpl msg
    } else {
        Model::addTerm(term: $term, definition: $definition);
        redirect(url: 'admin/');
    }
}

view(file: 'admin/create', data: $data);
