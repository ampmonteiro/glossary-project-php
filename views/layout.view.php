<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        PHP Fundamentals:
        <?= $view_bag['title'] ?? '--' ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>

    <nav class="bg-dark text-white py-4">
        <div class="container">
            <a class="navbar-brand" href="/">
                PHP Fundamentals:
                <?= $view_bag['title'] ?? '--' ?>
            </a>
        </div>
    </nav>

    <div class="container mt-3">
        <?php require $file . '.view.php'; ?>
    </div>


</body>

</html>