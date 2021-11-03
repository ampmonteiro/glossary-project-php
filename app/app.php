<?php

// echo dirname(__DIR__) . '/'; -> better solution

// echo '<br>';

// echo  dirname(__FILE__) . '/../';

//exit;

define("APP_PATH", dirname(__FILE__) . '/../');

require 'config.php';

require 'functions.php';

// require 'data/file_functions.php';

require 'data/DataProviderInterface.php';

require 'data/classes/Model.php';

require 'data/classes/FileDataProvider.php';

Model::initialize(new FileDataProvider(CONFIG['data_file']));
