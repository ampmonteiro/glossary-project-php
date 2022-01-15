<?php

declare(strict_types=1);


function redirect(string $url): void
{
    header("location:/{$url}");
    exit;
}

function view(string $file, array $data = [], string $layout = ''): void
{
    $default_layout     = APP_PATH . '_src/views/layouts/master.view.php';

    $alternative_layout = APP_PATH . '_src/views/layouts/' . $layout . '.view.php';

    $view_file          = APP_PATH . '_src/views/' . $file . '.view.php';

    $choosed_layout = null;

    if (!file_exists($view_file)) {

        die('view or file not found');
    }

    if (!file_exists($alternative_layout) && !file_exists($default_layout)) {

        extract($data);

        require_once $view_file;

        exit;
    }

    if (file_exists($alternative_layout)) {

        $choosed_layout = $alternative_layout;
    }

    if (!file_exists($alternative_layout) && file_exists($default_layout)) {

        $choosed_layout = $default_layout;
    }

    extract($data);

    ob_start();

    require_once $view_file;

    $content = ob_get_clean();

    include_once $choosed_layout;
}


function is_post(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function is_get(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * @param bool $strict true:  will remove html tags
 */

function sanitize_str(string $value, $strict = false): string
{
    $temp = null;

    if ($strict) {

        $temp = filter_var(strip_tags(trim($value)), FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (!$strict) {
        $temp = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
    }


    // $temp = esc(trim($value));

    if ($temp === false) {
        return '';
    }

    return $temp;
}

function sanitize_int(string $value): string
{

    $temp = filter_var(trim($value), FILTER_SANITIZE_NUMBER_INT);

    // $temp = esc(trim($value));

    if ($temp === false) {
        return '';
    }

    return $temp;
}

/**
 * Escaping html and etc
 */
function esc($val): mixed
{
    return htmlspecialchars(string: $val, flags: ENT_QUOTES, encoding: 'UTF-8', double_encode: false);
}


function authenticate_user(string $email, string $password): bool
{
    $users = CONFIG['users'];

    if (!isset($users[$email])) {
        return false;
    }

    $user_password = $users[$email];

    return password_verify($password, $user_password);
}

function is_user_authenticated(): bool
{
    return isset($_SESSION['email']);
}

function ensure_user_is_authenticated(): void
{
    if (!is_user_authenticated()) {
        redirect('login');
    }
}
