<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMembers
 *
 * @ORM\Table(name="abc_members")
 * @ORM\Entity
 */
class AbcMembers
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_card", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCard;

    /**
     * @var string
     *
     * @ORM\Column(name="admon_code", type="string", length=10, nullable=true)
     */
    private $admonCode;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=80, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="fistname", type="string", length=45, nullable=false)
     */
    private $fistname;

    /**
     * @var string
     *
     * @ORM\Column(name="middlename", type="string", length=45, nullable=true)
     */
    private $middlename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=7, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="place_of_birthdate", type="string", length=80, nullable=true)
     */
    private $placeOfBirthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=80, nullable=true)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="sitewide_login", type="string", length=180, nullable=false)
     */
    private $sitewideLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcMediaCommunication", mappedBy="idCard")
     */
    private $mediaType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcPosition", mappedBy="idCard")
     */
    private $position;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcAddresses", mappedBy="idCard")
     */
    private $adresses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcGroups", mappedBy="idCard")
     */
    private $group;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcIdType", mappedBy="idCard")
     */
    private $idType;

    /**
     * @var \AbcSadulation
     *
     * @ORM\ManyToOne(targetEntity="AbcSadulation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="saludation", referencedColumnName="id")
     * })
     */
    private $saludation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mediaType = new \Doctrine\Common\Collections\ArrayCollection();
        $this->position = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idType = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idCard
     *
     * @return string 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set admonCode
     *
     * @param string $admonCode
     * @return AbcMembers
     */
    public function setAdmonCode($admonCode)
    {
        $this->admonCode = $admonCode;
    
        return $this;
    }

    /**
     * Get admonCode
     *
     * @return string 
     */
    public function getAdmonCode()
    {
        return $this->admonCode;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return AbcMembers
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
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
     * Set fistname
     *
     * @param string $fistname
     * @return AbcMembers
     */
    public function setFistname($fistname)
    {
        $this->fistname = $fistname;
    
        return $this;
    }

    /**
     * Get fistname
     *
     * @return string 
     */
    public function getFistname()
    {
        return $this->fistname;
    }

    /**
     * Set middlename
     *
     * @param string $middlename
     * @return AbcMembers
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;
    
        return $this;
    }

    /**
     * Get middlename
     *
     * @return string 
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return AbcMembers
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return AbcMembers
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set placeOfBirthdate
     *
     * @param string $placeOfBirthdate
     * @return AbcMembers
     */
    public function setPlaceOfBirthdate($placeOfBirthdate)
    {
        $this->placeOfBirthdate = $placeOfBirthdate;
    
        return $this;
    }

    /**
     * Get placeOfBirthdate
     *
     * @return string 
     */
    public function getPlaceOfBirthdate()
    {
        return $this->placeOfBirthdate;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return AbcMembers
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    
        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return AbcMembers
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set sitewideLogin
     *
     * @param string $sitewideLogin
     * @return AbcMembers
     */
    public function setSitewideLogin($sitewideLogin)
    {
        $this->sitewideLogin = $sitewideLogin;
    
        return $this;
    }

    /**
     * Get sitewideLogin
     *
     * @return string 
     */
    public function getSitewideLogin()
    {
        return $this->sitewideLogin;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return AbcMembers
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMembers
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return AbcMembers
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return AbcMembers
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add mediaType
     *
     * @param \ABC\BookingBundle\Entity\AbcMediaCommunication $mediaType
     * @return AbcMembers
     */
    public function addMediaType(\ABC\BookingBundle\Entity\AbcMediaCommunication $mediaType)
    {
        $this->mediaType[] = $mediaType;
    
        return $this;
    }

    /**
     * Remove mediaType
     *
     * @param \ABC\BookingBundle\Entity\AbcMediaCommunication $mediaType
     */
    public function removeMediaType(\ABC\BookingBundle\Entity\AbcMediaCommunication $mediaType)
    {
        $this->mediaType->removeElement($mediaType);
    }

    /**
     * Get mediaType
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Add position
     *
     * @param \ABC\BookingBundle\Entity\AbcPosition $position
     * @return AbcMembers
     */
    public function addPosition(\ABC\BookingBundle\Entity\AbcPosition $position)
    {
        $this->position[] = $position;
    
        return $this;
    }

    /**
     * Remove position
     *
     * @param \ABC\BookingBundle\Entity\AbcPosition $position
     */
    public function removePosition(\ABC\BookingBundle\Entity\AbcPosition $position)
    {
        $this->position->removeElement($position);
    }

    /**
     * Get position
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add adresses
     *
     * @param \ABC\BookingBundle\Entity\AbcAddresses $adresses
     * @return AbcMembers
     */
    public function addAdresse(\ABC\BookingBundle\Entity\AbcAddresses $adresses)
    {
        $this->adresses[] = $adresses;
    
        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \ABC\BookingBundle\Entity\AbcAddresses $adresses
     */
    public function removeAdresse(\ABC\BookingBundle\Entity\AbcAddresses $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * Add group
     *
     * @param \ABC\BookingBundle\Entity\AbcGroups $group
     * @return AbcMembers
     */
    public function addGroup(\ABC\BookingBundle\Entity\AbcGroups $group)
    {
        $this->group[] = $group;
    
        return $this;
    }

    /**
     * Remove group
     *
     * @param \ABC\BookingBundle\Entity\AbcGroups $group
     */
    public function removeGroup(\ABC\BookingBundle\Entity\AbcGroups $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Add idType
     *
     * @param \ABC\BookingBundle\Entity\AbcIdType $idType
     * @return AbcMembers
     */
    public function addIdType(\ABC\BookingBundle\Entity\AbcIdType $idType)
    {
        $this->idType[] = $idType;
    
        return $this;
    }

    /**
     * Remove idType
     *
     * @param \ABC\BookingBundle\Entity\AbcIdType $idType
     */
    public function removeIdType(\ABC\BookingBundle\Entity\AbcIdType $idType)
    {
        $this->idType->removeElement($idType);
    }

    /**
     * Get idType
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set saludation
     *
     * @param \ABC\BookingBundle\Entity\AbcSadulation $saludation
     * @return AbcMembers
     */
    public function setSaludation(\ABC\BookingBundle\Entity\AbcSadulation $saludation = null)
    {
        $this->saludation = $saludation;
    
        return $this;
    }

    /**
     * Get saludation
     *
     * @return \ABC\BookingBundle\Entity\AbcSadulation 
     */
    public function getSaludation()
    {
        return $this->saludation;
    }
}