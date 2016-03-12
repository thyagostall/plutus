<?php
/**
 * Created by PhpStorm.
 * User: thyago
 * Date: 3/11/16
 * Time: 8:17 PM
 */

namespace Plutus\Controller;

use Plutus\Entity\User;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function register(Request $request) {
        $user = new User();
        $user->setFirstName($request->get('first_name'));
        $user->setLastName($request->get('last_name'));
        $user->setLogin($request->get('login'));
        $user->setPassword($request->get('password'));

        $entityManager = $this->app['orm.em'];
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->app->json(['response' => 'User registered successfully.']);
    }
}