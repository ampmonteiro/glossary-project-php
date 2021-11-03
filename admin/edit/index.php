<?php

session_start();

require '../../app/app.php';

ensure_user_is_authenticated();

$data = [
    'title'  => 'Edit Term',
];

# i think the verify get is une
if (is_get()) {

    $key = sanitize(value: $_GET['key']);

    # more like invalid key
    if (empty($key)) {

        view(file: 'not_found');
        die();
    }

    $term = Model::getTerm(term: $key);

    # more like data provided no exist
    if ($term == false) {
        view(file: 'not_found');
        die();
    }

    $data['item'] = $term;

    view(file: 'admin/edit', data: $data);
}

if (is_post()) {
    $term = sanitize(value: $_POST['term']);
    $definition = sanitize(value: $_POST['definition']);
    $original_term = sanitize(value: $_POST['original-term']);

    if (empty($term) || empty($definition) || empty($original_term)) {
        # Todo dpl msg
    } else {
        Model::updateTerm(originalTerm: $original_term, newTerm: $term, definition: $definition);
        redirect(url: 'admin/');
    }
}
