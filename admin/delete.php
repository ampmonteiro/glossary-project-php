<?php

session_start();

require '../app/app.php';

ensure_user_is_authenticated();
$view_bag = [
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

    $term = Data::get_term($key);

    # more like data provided no exist
    if ($term == false) {
        view('not_found');
        die();
    }

    view('admin/delete', $term);
}

if (is_post()) {
    $term = sanitize($_POST['term']);

    if (empty($term)) {
        # Todo dpl msg
    } else {
        Data::delete_term($term);
        redirect('index.php');
    }
}
