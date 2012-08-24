<?php

namespace DoodlePlus\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="DoodlePlus\EventBundle\Repository\ResponseRepository")
 */
class Response {	
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Event", inversedBy="responseUser")
	 * @ORM\JoinColumn(name="idEvent", onDelete="CASCADE", onUpdate="CASCADE")
	 */
	protected $idEvent;
	
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\User", inversedBy="responseEvent")
	 * @ORM\JoinColumn(name="idUser")
	 */
	protected $idUser;

	/**
     * @ORM\Column(type="boolean")
     */
	protected $answerUser;
	
	/**
     * @ORM\Column(type="boolean", nullable=true)
     */
	protected $withPartner;
	
    /**
     * Set answerUser
     *
     * @param boolean $answerUser
     */
    public function setAnswerUser($answerUser)
    {
        $this->answerUser = $answerUser;
    }

    /**
     * Get answerUser
     *
     * @return boolean 
     */
    public function getAnswerUser()
    {
        return $this->answerUser;
    }

    /**
     * Set withPartner
     *
     * @param boolean $withPartner
     */
    public function setWithPartner($withPartner)
    {
        $this->withPartner = $withPartner;
    }

    /**
     * Get withPartner
     *
     * @return boolean 
     */
    public function getWithPartner()
    {
        return $this->withPartner;
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