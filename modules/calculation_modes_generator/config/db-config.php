<?php

return [
    'driver' => 'mysql',
    'dsn' => 'mysql:host=mariadb;dbname=calcgen-db;charset=utf8',
    'username' => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PASSWORD'),
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_STRINGIFY_FETCHES => false,
        PDO::ATTR_EMULATE_PREPARES => false
    ],
];
