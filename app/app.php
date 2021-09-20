<?php

// echo dirname(__DIR__) . '/'; -> better solution

// echo '<br>';

// echo  dirname(__FILE__) . '/../';

//exit;

define("APP_PATH", dirname(__FILE__) . '/../');

require 'config.php';

require 'functions.php';

require 'data/file_functions.php';
