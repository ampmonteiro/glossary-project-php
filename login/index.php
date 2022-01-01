<?php

declare(strict_types=1);

session_start();

require '../_src/app.php';

$data = [
    'title'  => 'Login',
];

if (is_user_authenticated()) {
    redirect('admin');
}

if (is_post()) {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    /* 
        note:  should not be sanitize, should be hashed instead
        https://stackoverflow.com/questions/45538138/is-it-advisable-to-clean-password-input-too/45538150
    */
    $password = $_POST['password'];

    # compare with file store
    if (authenticate_user($email, $password)) {
        $_SESSION['email'] = $email;
        redirect('admin');
    } else {
        $data['status'] = 'the provided credentials did not work';
    }

    if ($email === false) {

        $data['status'] = 'Please enter a valid email address';
    }
}

view('login', $data);
