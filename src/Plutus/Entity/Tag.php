<?php

namespace Plutus\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag extends Entity
{
    /**
     * @ORM\Column(type="string", length=100)
     * @var String
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="tag")
     */
    private $transactions;

    /**
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param String $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }
}