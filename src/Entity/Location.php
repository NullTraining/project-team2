<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Point", mappedBy="location")
     */
    private $points;

    /**
     * @ORM\Column(type="text")
     */
    private $street;

    /**
     * @ORM\Column(type="text")
     */
    private $streetNumber;

    /**
     * @ORM\Column(type="text")
     */
    private $postBox;

    /**
     * @ORM\Column(type="text")
     */
    private $city;

    /**
     * @ORM\OneToOne(targetEntity="Item", mappedBy="location")
     */
    private $item;

    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->points = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param mixed $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return mixed
     */
    public function getPostBox()
    {
        return $this->postBox;
    }

    /**
     * @param mixed $postBox
     */
    public function setPostBox($postBox)
    {
        $this->postBox = $postBox;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }
}
