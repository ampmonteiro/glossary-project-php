<?php

session_start();

require '../app/app.php';

ensure_user_is_authenticated();

$data = [
    'title'  => 'Edit Term',
];

# i think the verify get is une
if (is_get()) {

    $key = sanitize($_GET['key']);

    # more like invalid key
    if (empty($key)) {

        view('not_found');
        die();
    }

    $term = get_term($key);

    # more like data provided no exist
    if ($term == false) {
        view('not_found');
        die();
    }

    $data['item'] = $term;

    view('admin/edit', $data);
}

if (is_post()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);
    $original_term = sanitize($_POST['original-term']);

    if (empty($term) || empty($definition) || empty($original_term)) {
        # Todo dpl msg
    } else {
        update_term($original_term, $term, $definition);
        redirect('index.php');
    }
}
