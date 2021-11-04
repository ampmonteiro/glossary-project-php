<?php


/* 
    Note: in db the host is ip because of the use of docker
    with individual container mysql db
*/

const CONFIG = [
    'data_file' => APP_PATH . 'data.json',
    'users' => [
        'admin@admin.com' => '123'
    ],
    'db' => 'mysql:dbname=glossary;host=172.17.0.3;port=3306',
    'db_user' => 'dev',
    'db_password' => 'secret'
];
