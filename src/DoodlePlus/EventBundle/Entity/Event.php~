<?php

namespace DoodlePlus\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="DoodlePlus\EventBundle\Repository\EventRepository")
 */
class Event {
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length="50", nullable=false)
     */
    protected $title;

    /**
     * @ORM\Column(type="datetime", nullable=false)
	 * @Assert\DateTime()
     */
    protected $datetimeBegin;

    /**
     * @ORM\Column(type="datetime", nullable=true)
	 * @Assert\DateTime()
     */
    protected $datetimeEnd;

    /**
     * @ORM\Column(type="string",length="50", nullable=false)
     */
    protected $location;
	
	/**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

	/**
     * @ORM\Column(type="boolean")
     */
    protected $hasPrice;
	
    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $price;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\User")
	 */
    protected $technicalUser;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\Batch")
	 */
	protected $organizersGroup;

	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\Batch")
	 */
	protected $eventGroup;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\Batch")
	 */
	protected $guestGroup;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\EmailBundle\Entity\Email")
	 */
	protected $emailGuest;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\UserBundle\Entity\Batch")
	 */
	protected $aPrioriGroup;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DoodlePlus\EmailBundle\Entity\Email")
	 */
	protected $emailAPriori;
	
	/**
     * @ORM\Column(type="boolean")
     */
    protected $hasResend;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
	 * @Assert\Date()
     */
	protected $send;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
	 * @Assert\Date()
     */
	protected $resend1;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
	 * @Assert\Date()
     */
	protected $resend2;
	
	/**
     * @ORM\Column(type="boolean")
     */
	protected $openGuestsGuest;
	
	/**
     * @ORM\Column(type="string")
	 * @Assert\Choice(choices = {"Partner", "Guests"})
     */
	protected $withSo;
	
	/**
     * @ORM\Column(type="boolean")
     */
	protected $openExternGuest;
	
	/**
	 * @ORM\Column(type="string",length="50", nullable=true)
	 */
	protected $titleEmailExtern;
	
	/**
     * @ORM\Column(type="text", nullable=true)
     */
	protected $contentEmailExtern;

	/**
     * @ORM\Column(type="datetime")
	 * @Assert\DateTime()
     */
	protected $dateReport;
	
	/**
	 * @ORM\OneToMany(targetEntity="InviteGuest", mappedBy="Event")
	 */
	//protected $inviteGuest;
	
	/**
     * @ORM\ManyToMany(targetEntity="DoodlePlus\ExternBundle\Entity\Extern")
     * @ORM\JoinTable(name="PresentExtern",
     *      joinColumns={@ORM\JoinColumn(name="idEvent", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="idExtern", referencedColumnName="id")}
     * )
     */
	//protected $presentExtern;
		
	/**
	 * @ORM\OneToMany(targetEntity="Response", mappedBy="Event")
	 */
	protected $responseUser;
	
	public function __toString() {
		return $this->title;
	}
	
    public function __construct()
    {
        $this->inviteGuest = new \Doctrine\Common\Collections\ArrayCollection();
		$this->responseUser = new \Doctrine\Common\Collections\ArrayCollection();
		$this->presentExtern = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set datetimeBegin
     *
     * @param datetime $datetimeBegin
     */
    public function setDatetimeBegin($datetimeBegin)
    {
        $this->datetimeBegin = $datetimeBegin;
    }

    /**
     * Get datetimeBegin
     *
     * @return datetime 
     */
    public function getDatetimeBegin()
    {
        return $this->datetimeBegin;
    }

    /**
     * Set datetimeEnd
     *
     * @param datetime $datetimeEnd
     */
    public function setDatetimeEnd($datetimeEnd)
    {
        $this->datetimeEnd = $datetimeEnd;
    }

    /**
     * Get datetimeEnd
     *
     * @return datetime 
     */
    public function getDatetimeEnd()
    {
        return $this->datetimeEnd;
    }

    /**
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set hasPrice
     *
     * @param boolean $hasPrice
     */
    public function setHasPrice($hasPrice)
    {
        $this->hasPrice = $hasPrice;
    }

    /**
     * Get hasPrice
     *
     * @return boolean 
     */
    public function getHasPrice()
    {
        return $this->hasPrice;
    }

    /**
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set hasResend
     *
     * @param boolean $hasResend
     */
    public function setHasResend($hasResend)
    {
        $this->hasResend = $hasResend;
    }

    /**
     * Get hasResend
     *
     * @return boolean 
     */
    public function getHasResend()
    {
        return $this->hasResend;
    }

    /**
     * Set send
     *
     * @param datetime $send
     */
    public function setSend($send)
    {
        $this->send = $send;
    }

    /**
     * Get send
     *
     * @return datetime 
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Set resend1
     *
     * @param datetime $resend1
     */
    public function setResend1($resend1)
    {
        $this->resend1 = $resend1;
    }

    /**
     * Get resend1
     *
     * @return datetime 
     */
    public function getResend1()
    {
        return $this->resend1;
    }

    /**
     * Set resend2
     *
     * @param datetime $resend2
     */
    public function setResend2($resend2)
    {
        $this->resend2 = $resend2;
    }

    /**
     * Get resend2
     *
     * @return datetime 
     */
    public function getResend2()
    {
        return $this->resend2;
    }

    /**
     * Set openGuestsGuest
     *
     * @param boolean $openGuestsGuest
     */
    public function setOpenGuestsGuest($openGuestsGuest)
    {
        $this->openGuestsGuest = $openGuestsGuest;
    }

    /**
     * Get openGuestsGuest
     *
     * @return boolean 
     */
    public function getOpenGuestsGuest()
    {
        return $this->openGuestsGuest;
    }

    /**
     * Set withSo
     *
     * @param string $withSo
     */
    public function setWithSo($withSo)
    {
        $this->withSo = $withSo;
    }

    /**
     * Get withSo
     *
     * @return string 
     */
    public function getWithSo()
    {
        return $this->withSo;
    }

    /**
     * Set openExternGuest
     *
     * @param boolean $openExternGuest
     */
    public function setOpenExternGuest($openExternGuest)
    {
        $this->openExternGuest = $openExternGuest;
    }

    /**
     * Get openExternGuest
     *
     * @return boolean 
     */
    public function getOpenExternGuest()
    {
        return $this->openExternGuest;
    }

    /**
     * Set titleEmailExtern
     *
     * @param string $titleEmailExtern
     */
    public function setTitleEmailExtern($titleEmailExtern)
    {
        $this->titleEmailExtern = $titleEmailExtern;
    }

    /**
     * Get titleEmailExtern
     *
     * @return string 
     */
    public function getTitleEmailExtern()
    {
        return $this->titleEmailExtern;
    }

    /**
     * Set contentEmailExtern
     *
     * @param text $contentEmailExtern
     */
    public function setContentEmailExtern($contentEmailExtern)
    {
        $this->contentEmailExtern = $contentEmailExtern;
    }

    /**
     * Get contentEmailExtern
     *
     * @return text 
     */
    public function getContentEmailExtern()
    {
        return $this->contentEmailExtern;
    }

    /**
     * Set dateReport
     *
     * @param datetime $dateReport
     */
    public function setDateReport($dateReport)
    {
        $this->dateReport = $dateReport;
    }

    /**
     * Get dateReport
     *
     * @return datetime 
     */
    public function getDateReport()
    {
        return $this->dateReport;
    }

    /**
     * Set technicalUser
     *
     * @param DoodlePlus\UserBundle\Entity\User $technicalUser
     */
    public function setTechnicalUser(\DoodlePlus\UserBundle\Entity\User $technicalUser)
    {
        $this->technicalUser = $technicalUser;
    }

    /**
     * Get technicalUser
     *
     * @return DoodlePlus\UserBundle\Entity\User 
     */
    public function getTechnicalUser()
    {
        return $this->technicalUser;
    }

    /**
     * Set organizersGroup
     *
     * @param DoodlePlus\UserBundle\Entity\Batch $organizersGroup
     */
    public function setOrganizersGroup(\DoodlePlus\UserBundle\Entity\Batch $organizersGroup)
    {
        $this->organizersGroup = $organizersGroup;
    }

    /**
     * Get organizersGroup
     *
     * @return DoodlePlus\UserBundle\Entity\Batch 
     */
    public function getOrganizersGroup()
    {
        return $this->organizersGroup;
    }

    /**
     * Set eventGroup
     *
     * @param DoodlePlus\UserBundle\Entity\Batch $eventGroup
     */
    public function setEventGroup(\DoodlePlus\UserBundle\Entity\Batch $eventGroup)
    {
        $this->eventGroup = $eventGroup;
    }

    /**
     * Get eventGroup
     *
     * @return DoodlePlus\UserBundle\Entity\Batch 
     */
    public function getEventGroup()
    {
        return $this->eventGroup;
    }

    /**
     * Set guestGroup
     *
     * @param DoodlePlus\UserBundle\Entity\Batch $guestGroup
     */
    public function setGuestGroup(\DoodlePlus\UserBundle\Entity\Batch $guestGroup)
    {
        $this->guestGroup = $guestGroup;
    }

    /**
     * Get guestGroup
     *
     * @return DoodlePlus\UserBundle\Entity\Batch 
     */
    public function getGuestGroup()
    {
        return $this->guestGroup;
    }

    /**
     * Set emailGuest
     *
     * @param DoodlePlus\EmailBundle\Entity\Email $emailGuest
     */
    public function setEmailGuest(\DoodlePlus\EmailBundle\Entity\Email $emailGuest)
    {
        $this->emailGuest = $emailGuest;
    }

    /**
     * Get emailGuest
     *
     * @return DoodlePlus\EmailBundle\Entity\Email 
     */
    public function getEmailGuest()
    {
        return $this->emailGuest;
    }

    /**
     * Set aPrioriGroup
     *
     * @param DoodlePlus\UserBundle\Entity\Batch $aPrioriGroup
     */
    public function setAPrioriGroup(\DoodlePlus\UserBundle\Entity\Batch $aPrioriGroup)
    {
        $this->aPrioriGroup = $aPrioriGroup;
    }

    /**
     * Get aPrioriGroup
     *
     * @return DoodlePlus\UserBundle\Entity\Batch 
     */
    public function getAPrioriGroup()
    {
        return $this->aPrioriGroup;
    }

    /**
     * Set emailAPriori
     *
     * @param DoodlePlus\EmailBundle\Entity\Email $emailAPriori
     */
    public function setEmailAPriori(\DoodlePlus\EmailBundle\Entity\Email $emailAPriori)
    {
        $this->emailAPriori = $emailAPriori;
    }

    /**
     * Get emailAPriori
     *
     * @return DoodlePlus\EmailBundle\Entity\Email 
     */
    public function getEmailAPriori()
    {
        return $this->emailAPriori;
    }

    /**
     * Add responseUser
     *
     * @param DoodlePlus\EventBundle\Entity\Response $responseUser
     */
    public function addResponse(\DoodlePlus\EventBundle\Entity\Response $responseUser)
    {
        $this->responseUser[] = $responseUser;
    }

    /**
     * Get responseUser
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getResponseUser()
    {
        return $this->responseUser;
    }
}