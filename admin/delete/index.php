<?php

session_start();

require '../../app/app.php';

ensure_user_is_authenticated();

$data = [
    'title'  => 'Delete Term',
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

    view('admin/delete', $data);
}

if (is_post()) {
    $term = sanitize($_POST['term']);

    if (empty($term)) {
        # Todo dpl msg
    } else {
        delete_term($term);
        redirect('admin');
    }
}
