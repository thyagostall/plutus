<?php

namespace Plutus\Entity;


use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="transactions")
 */
class Transaction extends Entity
{
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $created;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @var String
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=100)
     * @var String
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="transactions")
     */
    private $tag;

    public function __construct()
    {
        $this->created = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return String
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param String $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
}