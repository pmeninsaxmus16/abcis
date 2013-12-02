<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Applicant
 *
 * @ORM\Table(name="applicant")
 * @ORM\Entity
 */
class Applicant
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
     * @ORM\Column(name="surname", type="string", length=80, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="forename", type="string", length=80, nullable=false)
     */
    private $forename;

    /**
     * @var string
     *
     * @ORM\Column(name="middle", type="string", length=80, nullable=false)
     */
    private $middle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="pob", type="string", length=120, nullable=false)
     */
    private $pob;

    /**
     * @var string
     *
     * @ORM\Column(name="citizenship", type="string", length=80, nullable=false)
     */
    private $citizenship;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="religion", type="string", length=100, nullable=true)
     */
    private $religion;

    /**
     * @var string
     *
     * @ORM\Column(name="first_language", type="string", length=80, nullable=false)
     */
    private $firstLanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="second_language", type="string", length=80, nullable=true)
     */
    private $secondLanguage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=false)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=45, nullable=false)
     */
    private $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_grade", type="string", length=45, nullable=true)
     */
    private $entryGrade;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_year", type="string", length=45, nullable=true)
     */
    private $entryYear;

    /**
     * @var \Results
     *
     * @ORM\ManyToOne(targetEntity="Results")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \Relationship
     *
     * @ORM\ManyToOne(targetEntity="Relationship")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="living", referencedColumnName="id")
     * })
     */
    private $living;



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
     * Set surname
     *
     * @param string $surname
     * @return Applicant
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
     * Set forename
     *
     * @param string $forename
     * @return Applicant
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
    
        return $this;
    }

    /**
     * Get forename
     *
     * @return string 
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * Set middle
     *
     * @param string $middle
     * @return Applicant
     */
    public function setMiddle($middle)
    {
        $this->middle = $middle;
    
        return $this;
    }

    /**
     * Get middle
     *
     * @return string 
     */
    public function getMiddle()
    {
        return $this->middle;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return Applicant
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    
        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set pob
     *
     * @param string $pob
     * @return Applicant
     */
    public function setPob($pob)
    {
        $this->pob = $pob;
    
        return $this;
    }

    /**
     * Get pob
     *
     * @return string 
     */
    public function getPob()
    {
        return $this->pob;
    }

    /**
     * Set citizenship
     *
     * @param string $citizenship
     * @return Applicant
     */
    public function setCitizenship($citizenship)
    {
        $this->citizenship = $citizenship;
    
        return $this;
    }

    /**
     * Get citizenship
     *
     * @return string 
     */
    public function getCitizenship()
    {
        return $this->citizenship;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Applicant
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
     * Set religion
     *
     * @param string $religion
     * @return Applicant
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;
    
        return $this;
    }

    /**
     * Get religion
     *
     * @return string 
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set firstLanguage
     *
     * @param string $firstLanguage
     * @return Applicant
     */
    public function setFirstLanguage($firstLanguage)
    {
        $this->firstLanguage = $firstLanguage;
    
        return $this;
    }

    /**
     * Get firstLanguage
     *
     * @return string 
     */
    public function getFirstLanguage()
    {
        return $this->firstLanguage;
    }

    /**
     * Set secondLanguage
     *
     * @param string $secondLanguage
     * @return Applicant
     */
    public function setSecondLanguage($secondLanguage)
    {
        $this->secondLanguage = $secondLanguage;
    
        return $this;
    }

    /**
     * Get secondLanguage
     *
     * @return string 
     */
    public function getSecondLanguage()
    {
        return $this->secondLanguage;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Applicant
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
     * Set ip
     *
     * @param string $ip
     * @return Applicant
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     * @return Applicant
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    
        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set entryGrade
     *
     * @param string $entryGrade
     * @return Applicant
     */
    public function setEntryGrade($entryGrade)
    {
        $this->entryGrade = $entryGrade;
    
        return $this;
    }

    /**
     * Get entryGrade
     *
     * @return string 
     */
    public function getEntryGrade()
    {
        return $this->entryGrade;
    }

    /**
     * Set entryYear
     *
     * @param string $entryYear
     * @return Applicant
     */
    public function setEntryYear($entryYear)
    {
        $this->entryYear = $entryYear;
    
        return $this;
    }

    /**
     * Get entryYear
     *
     * @return string 
     */
    public function getEntryYear()
    {
        return $this->entryYear;
    }

    /**
     * Set status
     *
     * @param \ABC\AdmissionBundle\Entity\Results $status
     * @return Applicant
     */
    public function setStatus(\ABC\AdmissionBundle\Entity\Results $status = null)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return \ABC\AdmissionBundle\Entity\Results 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set living
     *
     * @param \ABC\AdmissionBundle\Entity\Relationship $living
     * @return Applicant
     */
    public function setLiving(\ABC\AdmissionBundle\Entity\Relationship $living = null)
    {
        $this->living = $living;
    
        return $this;
    }

    /**
     * Get living
     *
     * @return \ABC\AdmissionBundle\Entity\Relationship 
     */
    public function getLiving()
    {
        return $this->living;
    }
}