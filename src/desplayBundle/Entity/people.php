<?php

namespace desplayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * people
 *
 * @ORM\Table(name="people")
 * @ORM\Entity(repositoryClass="desplayBundle\Repository\peopleRepository")
 */
class people
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="arrival", type="string", length=255)
     */
    private $arrival;

    /**
     * @var string
     *
     * @ORM\Column(name="departure", type="string", length=255)
     */
    private $departure;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="stay", type="string", length=255)
     */
    private $stay;

    /**
     * @var integer
     *
     * @ORM\Column(name="manyPeople", type="decimal")
     */
    private $manyPeople;

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
     * Set name
     *
     * @param string $name
     *
     * @return people
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return people
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return people
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set arrival
     *
     * @param string $arrival
     *
     * @return people
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set departure
     *
     * @param string $departure
     *
     * @return people
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return people
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set stay
     *
     * @param string $stay
     *
     * @return people
     */
    public function setStay($stay)
    {
        $this->stay = $stay;

        return $this;
    }

    /**
     * Get stay
     *
     * @return string
     */
    public function getStay()
    {
        return $this->stay;
    }


    /**
     * Set manyPeople
     *
     * @param string $manyPeople
     *
     * @return people
     */
    public function setManyPeople($manyPeople)
    {
        $this->manyPeople = $manyPeople;

        return $this;
    }

    /**
     * Get manyPeople
     *
     * @return string
     */
    public function getManyPeople()
    {
        return $this->manyPeople;
    }
}
