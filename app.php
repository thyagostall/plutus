<?php

date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/vendor/autoload.php';

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;

$config = require_once __DIR__ . '/config/config.php';
if (!$config || !is_array($config)) {
    throw new Exception('Error processing config', 1);
}

$app = new Application();
$app['debug'] = true;

$app->register(new \Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $config['db.options']
));

$app->register(new DoctrineOrmServiceProvider(), array(
    'orm.proxies_dir' => sys_get_temp_dir() . '/' . md5(__DIR__ . getenv('APPLICATION_ENV')),
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'use_simple_annotation_reader' => false,
                'namespace' => 'Plutus\Entity',
                'path' => __DIR__ . '/src'
            )
        )
    ),
    'orm.proxies_namespace' => 'EntityProxy',
    'orm.auto_generate_proxies' => true,
    'orm.default_cache' => $config['db.options']['cache']
));

$app->get('/', function() {
    return '';
});

$app->run();