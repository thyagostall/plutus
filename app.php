<?php

date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/vendor/autoload.php';

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Plutus\Controller\TagController;
use Plutus\Controller\TransactionController;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;

$config = require_once __DIR__ . '/config/config.php';
if (!$config || !is_array($config)) {
    throw new Exception('Error processing config', 1);
}

$app = new Application();
$app['debug'] = true;

$app->register(new DoctrineServiceProvider(), array(
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

$app->before(function(Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

$app->post('/tag', function(Request $request) use ($app) {
    $controller = new TagController($app);
    return $controller->insert($request);
});

$app->get('/tag', function() use ($app) {
    $controller = new TagController($app);
    return $controller->get();
});

$app->post('/transaction', function(Request $request) use ($app) {
    $controller = new TransactionController($app);
    return $controller->create($request);
});

$app->get('/transaction', function(Request $request) use ($app) {
    $controller = new TransactionController($app);
    return $controller->get($request);
});

$app->get('/', function() use ($app) {
    $entityManager = $app['orm.em'];

    $result = "<ul>";

    $tagRepository = $entityManager->getRepository('Plutus\\Entity\\Tag');
    $tags = $tagRepository->findAll();

    foreach ($tags as $tag) {
        $result .= "<li>" . $tag->getTitle() . "</li>";
    }

    return $result . "</ul>";
});

$app->run();