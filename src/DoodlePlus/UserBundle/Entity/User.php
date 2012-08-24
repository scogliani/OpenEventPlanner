<?php

namespace DoodlePlus\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="DoodlePlus\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length="35")
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string",length="35")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string",length="35", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(type="string",length="20", nullable=true)
     */
    protected $phonenumber;

    /**
     * @ORM\Column(type="string",length="50", nullable=true)
     */
    protected $function;

    /**
     * @ORM\Column(type="string",length="50", nullable=true)
     */
    protected $reference;
	
	/**
     * @ORM\ManyToMany(targetEntity="Batch", inversedBy="users")
	 * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="Belong",
	 *  joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *  inverseJoinColumns={@ORM\JoinColumn(name="batch_id", referencedColumnName="id")}
	 * )
     */
    protected $groups;
	
	/**
	 * @ORM\OneToMany(targetEntity="DoodlePlus\EventBundle\Entity\Response", mappedBy="User")
	 */
	protected $responseEvent;
	
	public function __toString() {
		return $this->email;
	}
	
	/**
     * Sets the email.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        parent::setEmail($email);
		parent::setUsername($email);
    }
	
    public function __construct()
    {
		parent::__construct();
		$this->roles = array(static::ROLE_DEFAULT);
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
		$this->responseEvent = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
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
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    /**
     * Get phonenumber
     *
     * @return string 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set function
     *
     * @param string $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * Get function
     *
     * @return string 
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set reference
     *
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Add groups
     *
     * @param DoodlePlus\UserBundle\Entity\Batch $groups
     */
    public function addBatch(\DoodlePlus\UserBundle\Entity\Batch $groups)
    {
        $this->groups[] = $groups;
    }

    /**
     * Get groups
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add responseEvent
     *
     * @param DoodlePlus\EventBundle\Entity\Response $responseEvent
     */
    public function addResponse(\DoodlePlus\EventBundle\Entity\Response $responseEvent)
    {
        $this->responseEvent[] = $responseEvent;
    }

    /**
     * Get responseEvent
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getResponseEvent()
    {
        return $this->responseEvent;
    }
}