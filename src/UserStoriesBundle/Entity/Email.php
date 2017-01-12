<?php

namespace UserStoriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="UserStoriesBundle\Repository\EmailRepository")
 */
class Email
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
     * @ORM\Column(name="email_address", type="string", length=255)
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_email")
     * @ORM\JoinColumn(name="user_email", referencedColumnName="id", onDelete="CASCADE")
     */
    private $email_user;

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
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return Email
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Email
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
     * Set emailUser
     *
     * @param \UserStoriesBundle\Entity\User $emailUser
     *
     * @return Email
     */
    public function setEmailUser(\UserStoriesBundle\Entity\User $emailUser = null)
    {
        $this->email_user = $emailUser;

        return $this;
    }

    /**
     * Get emailUser
     *
     * @return \UserStoriesBundle\Entity\User
     */
    public function getEmailUser()
    {
        return $this->email_user;
    }
}
