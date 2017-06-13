<?php

namespace desplayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cost
 *
 * @ORM\Table(name="cost")
 * @ORM\Entity(repositoryClass="desplayBundle\Repository\costRepository")
 */
class cost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="people", type="float")
     */
    private $people;

    /**
     * @var float
     *
     * @ORM\Column(name="power", type="float")
     */
    private $power;

    /**
     * @var float
     *
     * @ORM\Column(name="childcost", type="float")
     */
    private $childcost;

    /**
     * @var float
     *
     * @ORM\Column(name="tent", type="float")
     */
    private $tent;

    /**
     * @var float
     *
     * @ORM\Column(name="tentRent", type="float")
     */
    private $tentRent;

    /**
     * @var float
     *
     * @ORM\Column(name="caravan", type="float")
     */
    private $caravan;

    /**
     * @var float
     *
     * @ORM\Column(name="caravanRent", type="float")
     */
    private $caravanRent;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set people
     *
     * @param float $people
     *
     * @return cost
     */
    public function setPeople($people)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return float
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set power
     *
     * @param float $power
     *
     * @return cost
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return float
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set childcost
     *
     * @param float $childcost
     *
     * @return cost
     */
    public function setChildcost($childcost)
    {
        $this->childcost = $childcost;

        return $this;
    }

    /**
     * Get childcost
     *
     * @return float
     */
    public function getChildcost()
    {
        return $this->childcost;
    }

    /**
     * Set tent
     *
     * @param float $tent
     *
     * @return cost
     */
    public function setTent($tent)
    {
        $this->tent = $tent;

        return $this;
    }

    /**
     * Get tent
     *
     * @return float
     */
    public function getTent()
    {
        return $this->tent;
    }

    /**
     * Set tentRent
     *
     * @param float $tentRent
     *
     * @return cost
     */
    public function setTentRent($tentRent)
    {
        $this->tentRent = $tentRent;

        return $this;
    }

    /**
     * Get tentRent
     *
     * @return float
     */
    public function getTentRent()
    {
        return $this->tentRent;
    }

    /**
     * Set caravan
     *
     * @param float $caravan
     *
     * @return cost
     */
    public function setCaravan($caravan)
    {
        $this->caravan = $caravan;

        return $this;
    }

    /**
     * Get caravan
     *
     * @return float
     */
    public function getCaravan()
    {
        return $this->caravan;
    }

    /**
     * Set caravanRent
     *
     * @param float $caravanRent
     *
     * @return cost
     */
    public function setCaravanRent($caravanRent)
    {
        $this->caravanRent = $caravanRent;

        return $this;
    }

    /**
     * Get caravanRent
     *
     * @return float
     */
    public function getCaravanRent()
    {
        return $this->caravanRent;
    }
}

