<?php

return [
//    'db.options' => [
//        'driver' => 'pdo_pgsql',
//        'user' => 'some_user',
//        'password' => 'some_password',
//        'host' => 'localhost',
//        'port' => 5432,
//        'dbname' => 'some_db',
//        'default_dbname' => 'postgres',
//        'cache' => 'array'
//    ],
    'db.options' => [
        'url' => getenv('DATABASE_URL'),
        'cache' => 'array'
    ]
];