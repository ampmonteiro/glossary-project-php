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
    $term = sanitize_str(value: $_POST['term'], strict: true);
    $definition = sanitize_str(value: $_POST['definition'], strict: true);

    if (empty($term) || empty($definition)) {
        # Todo dpl msg
    } else {
        Model::addTerm(term: $term, definition: $definition);
        redirect(url: 'admin/');
    }
}

view(file: 'admin/create', data: $data);
