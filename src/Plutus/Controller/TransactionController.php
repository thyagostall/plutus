<?php
/**
 * Created by PhpStorm.
 * User: thyago
 * Date: 3/4/16
 * Time: 7:25 PM
 */

namespace Plutus\Controller;


use Plutus\Entity\Transaction;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class TransactionController
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function create(Request $request)
    {
//        $amount = $request->get('amount');
//        $description = $request->get('description');
//        $tagId = $request = $request->get('tag_id');
//
//        $entityManager = $this->app['orm.em'];
//        $tagRepository = $entityManager->getRepository('Plutus\\Entity\\Tag');
//        $tag = $tagRepository->find($tagId);
//        if (is_null($tag)) {
//            return $this->app->json(['response' => 'Tag not found'], 404);
//        }
//
//        $transaction = new Transaction();
//        $transaction->setAmount($amount);
//        $transaction->setDescription($description);
//
//        $entityManager->persist($transaction);
//        $entityManager->flush();

        return $this->app->json(['response' => 'OK']);
    }

    public function get(Request $request)
    {
//        $entityManager = $this->app['orm.em'];
//        $transactionRepository = $entityManager->getRepository('Plutus\\Entity\\Transaction');
//
//        $result = [];
//        $transactions = $transactionRepository->findAll();
//        foreach ($transactions as $transaction) {
//            $jsonTransaction = [
//                'created' => $transaction->getCreated()->format('U'),
//                'description' => $transaction->getDescription(),
//                'amount' => $transaction->getAmount(),
//                'tag_title' => $transaction->getTag()->getTitle()
//            ];
//            array_push($result, $jsonTransaction);
//        }
        return $this->app->json($result);
    }
}