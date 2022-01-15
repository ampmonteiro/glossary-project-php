<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alternative layout</title>
    <style>
        body {
            display: grid;
            place-content: center;
        }
    </style>
</head>

<body>
    <h1>Simple Layout</h1>

    <main>
        <?= $content; ?>
    </main>
</body>

</html>