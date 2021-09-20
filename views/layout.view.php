<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        PHP Fundamentals:
        <?= $view_bag['title'] ?? '--' ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

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