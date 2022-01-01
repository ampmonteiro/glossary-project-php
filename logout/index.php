<?php

declare(strict_types=1);

session_start();
session_unset();
session_destroy();

require '../_src/app.php';

redirect('login');
