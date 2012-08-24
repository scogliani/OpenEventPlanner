<?php

namespace DoodlePlus\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class InviteGuest {
	/**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Event", inversedBy="inviteGuest")
	 * @ORM\JoinColumn(name="idEvent", onDelete="CASCADE", onUpdate="CASCADE")
	 */
	protected $idEvent;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\User", inversedBy="responseEvent")
	 * @ORM\JoinColumn(name="idUser")
	 */
	protected $idUser;

	/**
     * @ORM\Column(type="string", length="35")
	 * @Assert\NotNull()
     */
	protected $firstname;
	
	/**
     * @ORM\Column(type="boolean", length="35")
	 * @Assert\NotNull()
     */
	protected $lastname;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param boolean $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return boolean 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set idEvent
     *
     * @param DoodlePlus\EventBundle\Entity\Event $idEvent
     */
    public function setIdEvent(\DoodlePlus\EventBundle\Entity\Event $idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * Get idEvent
     *
     * @return DoodlePlus\EventBundle\Entity\Event 
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set idUser
     *
     * @param DoodlePlus\UserBundle\Entity\User $idUser
     */
    public function setIdUser(\DoodlePlus\UserBundle\Entity\User $idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * Get idUser
     *
     * @return DoodlePlus\UserBundle\Entity\User 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}