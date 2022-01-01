<?php

$is_auth = is_user_authenticated();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        PHP Fundamentals:
        <?= $title ?? '--' ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>

    <header class="bg-dark text-white py-4">
        <section class="container d-flex  justify-content-between">
            <a class="navbar-brand" href="/">
                PHP Fundamentals:
                <?= $title ?? '--' ?>
            </a>
            <?php if ($is_auth) : ?>

                <nav class="d-flex gap-5 align-items-center">
                    <a class="text-decoration-none link-success" href="/admin/">Admin</a>
                    <a class="btn btn-danger" href="/logout/">Logout</a>
                </nav>

            <?php else : ?>
                <a class="btn btn-outline-primary" href="/login">Login</a>
            <?php endif ?>
        </section>
    </header>

    <div class="container mt-3">
        <?php require $file . '.view.php'; ?>
    </div>

</body>

</html>