<?php

namespace UserStoriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="UserStoriesBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="house_number", type="integer")
     */
    private $houseNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="apartments", type="integer", nullable=true)
     */
    private $apartments;

    /**
     * @var string
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_address")
     * @ORM\JoinColumn(name="user_address", referencedColumnName="id", onDelete="CASCADE")
     */
    private $address_user;

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
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNumber
     *
     * @param integer $houseNumber
     *
     * @return Address
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get houseNumber
     *
     * @return int
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set apartments
     *
     * @param integer $apartments
     *
     * @return Address
     */
    public function setApartments($apartments)
    {
        $this->apartments = $apartments;

        return $this;
    }

    /**
     * Get apartments
     *
     * @return int
     */
    public function getApartments()
    {
        return $this->apartments;
    }

    /**
     * Set addressUser
     *
     * @param \UserStoriesBundle\Entity\User $addressUser
     *
     * @return Address
     */
    public function setAddressUser(\UserStoriesBundle\Entity\User $addressUser = null)
    {
        $this->address_user = $addressUser;

        return $this;
    }

    /**
     * Get addressUser
     *
     * @return \UserStoriesBundle\Entity\User
     */
    public function getAddressUser()
    {
        return $this->address_user;
    }
}
