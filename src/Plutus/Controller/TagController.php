<?php

namespace Plutus\Controller;


use Plutus\Entity\Tag;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TagController
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function insert(Request $request)
    {
        $title = $request->get('title');

        $entityManager = $this->app['orm.em'];

        $newTag = new Tag();
        $newTag->setTitle($title);

        $entityManager->persist($newTag);
        $entityManager->flush();
        return $this->app->json(['result' => 'success']);
    }

}