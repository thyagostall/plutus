<?php
/**
 * Created by PhpStorm.
 * User: thyago
 * Date: 3/4/16
 * Time: 5:17 PM
 */

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
        return new JsonResponse(['result' => 'success']);
    }

}