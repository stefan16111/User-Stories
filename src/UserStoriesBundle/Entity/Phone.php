<?php

namespace UserStoriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Phone
 *
 * @ORM\Table(name="phone")
 * @ORM\Entity(repositoryClass="UserStoriesBundle\Repository\PhoneRepository")
 */
class Phone
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
     * @var int
     *
     * @ORM\Column(name="phone_number", type="integer")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
    /**
     * @var string
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_phone")
     * @ORM\JoinColumn(name="phone_user", referencedColumnName="id")
     */
    private $phone_user;


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
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     *
     * @return Phone
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Phone
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set phoneUser
     *
     * @param \UserStoriesBundle\Entity\User $phoneUser
     *
     * @return Phone
     */
    public function setPhoneUser(\UserStoriesBundle\Entity\User $phoneUser = null)
    {
        $this->phone_user = $phoneUser;

        return $this;
    }

    /**
     * Get phoneUser
     *
     * @return \UserStoriesBundle\Entity\User
     */
    public function getPhoneUser()
    {
        return $this->phone_user;
    }
}
