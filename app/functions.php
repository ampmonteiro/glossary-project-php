<?php

declare(strict_types=1);


function redirect(string $url): void
{
    header("location:{$url}");
    die();
}

function view(string $file, array | object $model = []): void
{
    global $view_bag;

    require APP_PATH . "views/layout.view.php";
}

function is_post(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function is_get(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}


function sanitize(string $value): string
{
    $temp = filter_var(trim($value), FILTER_SANITIZE_STRING);

    if ($temp === false) {
        return '';
    }

    return $temp;
}

function authenticate_user(string $email, string $password): bool
{
    $users = CONFIG['users'];

    if (!isset($users[$email])) {
        return false;
    }

    $user_password = $users[$email];

    return $password === $user_password;
}

function is_user_authenticated(): bool
{
    return isset($_SESSION['email']);
}

function ensure_user_is_authenticated(): void
{
    if (!is_user_authenticated()) {
        redirect('../login.php'); #  find a better way, because if it was in subfolder ???
    }
}
