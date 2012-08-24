<?php

namespace DoodlePlus\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use FOS\UserBundle\Entity\Group as BaseGroup;

/**
 * @ORM\Entity
 */
class Batch extends BaseGroup
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
	
	/**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    protected $users;
	
	public function __toString() {
		return $this->name;
	}
	
    public function __construct()
    {
		parent::__construct($this->name);
		$this->roles = array('ROLE_USER');
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Add users
     *
     * @param DoodlePlus\UserBundle\Entity\User $users
     */
    public function addUser(\DoodlePlus\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}