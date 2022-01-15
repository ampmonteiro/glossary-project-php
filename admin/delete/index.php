<?php

session_start();

require '../../_src/app.php';

ensure_user_is_authenticated();

$data = [
    'title'  => 'Delete Term',
];

# i think the verify get is une
if (is_get()) {

    $key = sanitize_int(value: $_GET['key']);

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

    view(file: 'admin/delete', data: $data);
}

if (is_post()) {
    $term = sanitize_int(value: $_POST['term']);

    if (empty($term)) {
        # Todo dpl msg
    } else {
        Model::deleteTerm(term: $term);
        redirect(url: 'admin');
    }
}
