<?php

date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/vendor/autoload.php';

use Silex\Application;

$app = new Application();
$app['debug'] = true;


$app->get('/', function() {
    return 'I\'m alive';
});

$app->run();