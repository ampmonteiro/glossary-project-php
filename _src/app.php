<?php

// echo dirname(__DIR__) . '/'; -> better solution

// echo '<br>';

// echo  dirname(__FILE__) . '/../';

//exit;

// require 'data/file_functions.php';
// require 'data/classes/FileDataProvider.php';

// require 'data/mysqldataprovider.class.php';
// Model::initialize(new FileDataProvider(CONFIG['data_file']));

// define("APP_PATH", dirname(__FILE__) . '/../');

define("APP_PATH",  dirname(__DIR__) . '/');

require 'data/config.php';

require 'functions/core_functions.php';

require 'interfaces/DataProviderInterface.php';

require 'classes/Model.php';

require 'classes/GlossaryTerm.php';

require 'classes/MySqlDataProvider.php';

Model::initialize(new MysqlDataProvider(CONFIG['db']));
