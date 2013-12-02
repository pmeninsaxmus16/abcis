<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMembers
 *
 * @ORM\Table(name="abc_members")
 * @ORM\Entity(repositoryClass="ABC\IsystemBundle\Repository\AbcMembersRepository")
 */
class AbcMembers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="id_card", type="string", length=10, nullable=false)
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
     * @ORM\Column(name="firstname", type="string", length=45, nullable=false)
     */
    private $firstname;

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
     * @var \AbcSadulation
     *
     * @ORM\ManyToOne(targetEntity="AbcSadulation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="saludation", referencedColumnName="id")
     * })
     */
    private $saludation;

    /**
     * @ORM\OneToMany(targetEntity="AbcStudents", mappedBy="member", cascade={"persist", "remove"})
     **/
    private $tribe;  
    
    /**
     * @ORM\OneToOne(targetEntity="AbcStudents", mappedBy="member", cascade={"persist", "remove"})
     **/
    private $classYear;

     public function __construct()
    {
        $this->tribe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->classYear = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idCard
     *
     * @param string $idCard
     * @return AbcMembers
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;
    
        return $this;
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
     * Set firstname
     *
     * @param string $firstname
     * @return AbcMembers
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
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
     * Set saludation
     *
     * @param \ABC\IsystemBundle\Entity\AbcSadulation $saludation
     * @return AbcMembers
     */
    public function setSaludation(\ABC\IsystemBundle\Entity\AbcSadulation $saludation = null)
    {
        $this->saludation = $saludation;
    
        return $this;
    }

    /**
     * Get saludation
     *
     * @return \ABC\IsystemBundle\Entity\AbcSadulation 
     */
    public function getSaludation()
    {
        return $this->saludation;
    }
    
    public function getTribe() {
        return $this->tribe;
    }

    public function setTribe($tribe) {
        $this->tribe = $tribe;
    }
    
    public function getClassYear() {
        return $this->classYear;
    }

    public function setClassYear($classYear) {
        $this->classYear = $classYear;
    }

}
