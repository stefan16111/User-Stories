<?php

namespace UserStoriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserStoriesBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var string
     * 
     * @ORM\OneToMany(targetEntity="Address", mappedBy="address_user")
     */
    private $user_address;

    /**
     * @var string
     * 
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="phone_user")
     */
    private $user_phone;
    
    /**
     * @var string
     * 
     * @ORM\OneToMany(targetEntity="Email", mappedBy="email_user")
     */
    private $user_email;
    
    public function __construct() {
        $this->user_address = new ArrayCollection();
        $this->user_phone = new ArrayCollection();
        $this->user_email = new ArrayCollection();
    }
    
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
     * @return User
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
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add userAddress
     *
     * @param \UserStoriesBundle\Entity\Address $userAddress
     *
     * @return User
     */
    public function addUserAddress(\UserStoriesBundle\Entity\Address $userAddress)
    {
        $this->user_address[] = $userAddress;

        return $this;
    }

    /**
     * Remove userAddress
     *
     * @param \UserStoriesBundle\Entity\Address $userAddress
     */
    public function removeUserAddress(\UserStoriesBundle\Entity\Address $userAddress)
    {
        $this->user_address->removeElement($userAddress);
    }

    /**
     * Get userAddress
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserAddress()
    {
        return $this->user_address;
    }

    /**
     * Add userPhone
     *
     * @param \UserStoriesBundle\Entity\Phone $userPhone
     *
     * @return User
     */
    public function addUserPhone(\UserStoriesBundle\Entity\Phone $userPhone)
    {
        $this->user_phone[] = $userPhone;

        return $this;
    }

    /**
     * Remove userPhone
     *
     * @param \UserStoriesBundle\Entity\Phone $userPhone
     */
    public function removeUserPhone(\UserStoriesBundle\Entity\Phone $userPhone)
    {
        $this->user_phone->removeElement($userPhone);
    }

    /**
     * Get userPhone
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserPhone()
    {
        return $this->user_phone;
    }

    /**
     * Add userEmail
     *
     * @param \UserStoriesBundle\Entity\Email $userEmail
     *
     * @return User
     */
    public function addUserEmail(\UserStoriesBundle\Entity\Email $userEmail)
    {
        $this->user_email[] = $userEmail;

        return $this;
    }

    /**
     * Remove userEmail
     *
     * @param \UserStoriesBundle\Entity\Email $userEmail
     */
    public function removeUserEmail(\UserStoriesBundle\Entity\Email $userEmail)
    {
        $this->user_email->removeElement($userEmail);
    }

    /**
     * Get userEmail
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }
}
