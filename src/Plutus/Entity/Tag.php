<?php
/**
 * Created by PhpStorm.
 * User: thyago
 * Date: 2/26/16
 * Time: 6:07 PM
 */

namespace Plutus\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag extends Entity
{
    /**
     * @ORM\Column(type="string", maxlength=100)
     * @var String
     */
    private $title;

    /**
     * @OneToMany(targetEntity="Transaction", mappedBy="tag")
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