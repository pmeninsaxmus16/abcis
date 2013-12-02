<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
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
     * @ORM\Column(name="middle", type="string", length=80, nullable=true)
     */
    private $middle;

    /**
     * @var string
     *
     * @ORM\Column(name="forename", type="string", length=80, nullable=false)
     */
    private $forename;

    /**
     * @var string
     *
     * @ORM\Column(name="id_type", type="string", length=255, nullable=false)
     */
    private $idType;

    /**
     * @var string
     *
     * @ORM\Column(name="id_number", type="string", length=20, nullable=false)
     */
    private $idNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="citizenship", type="string", length=100, nullable=false)
     */
    private $citizenship;

    /**
     * @var string
     *
     * @ORM\Column(name="languages_spoken", type="string", length=255, nullable=false)
     */
    private $languagesSpoken;

    /**
     * @var string
     *
     * @ORM\Column(name="school_attended", type="string", length=100, nullable=false)
     */
    private $schoolAttended;

    /**
     * @var integer
     *
     * @ORM\Column(name="abc_promotionyear", type="integer", nullable=false)
     */
    private $abcPromotionyear;

    /**
     * @var string
     *
     * @ORM\Column(name="home_phonenumber", type="string", length=15, nullable=true)
     */
    private $homePhonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phonenumber", type="string", length=15, nullable=true)
     */
    private $mobilePhonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="employer", type="string", length=150, nullable=true)
     */
    private $employer;

    /**
     * @var string
     *
     * @ORM\Column(name="responsible", type="string", length=255, nullable=false)
     */
    private $responsible;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=100, nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="e_mail", type="string", length=80, nullable=true)
     */
    private $eMail;

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
     * @ORM\Column(name="is_payer", type="string", length=255, nullable=true)
     */
    private $isPayer;

    /**
     * @var \Applicant
     *
     * @ORM\ManyToOne(targetEntity="Applicant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="applicant_id", referencedColumnName="id")
     * })
     */
    private $applicant;

    /**
     * @var \MaritalStatus
     *
     * @ORM\ManyToOne(targetEntity="MaritalStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marital_status", referencedColumnName="id")
     * })
     */
    private $maritalStatus;

    /**
     * @var \Relationship
     *
     * @ORM\ManyToOne(targetEntity="Relationship")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relationship", referencedColumnName="id")
     * })
     */
    private $relationship;



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
     * @return Contact
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
     * Set middle
     *
     * @param string $middle
     * @return Contact
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
     * Set forename
     *
     * @param string $forename
     * @return Contact
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
     * Set idType
     *
     * @param string $idType
     * @return Contact
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;
    
        return $this;
    }

    /**
     * Get idType
     *
     * @return string 
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set idNumber
     *
     * @param string $idNumber
     * @return Contact
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
    
        return $this;
    }

    /**
     * Get idNumber
     *
     * @return string 
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * Set citizenship
     *
     * @param string $citizenship
     * @return Contact
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
     * Set languagesSpoken
     *
     * @param string $languagesSpoken
     * @return Contact
     */
    public function setLanguagesSpoken($languagesSpoken)
    {
        $this->languagesSpoken = $languagesSpoken;
    
        return $this;
    }

    /**
     * Get languagesSpoken
     *
     * @return string 
     */
    public function getLanguagesSpoken()
    {
        return $this->languagesSpoken;
    }

    /**
     * Set schoolAttended
     *
     * @param string $schoolAttended
     * @return Contact
     */
    public function setSchoolAttended($schoolAttended)
    {
        $this->schoolAttended = $schoolAttended;
    
        return $this;
    }

    /**
     * Get schoolAttended
     *
     * @return string 
     */
    public function getSchoolAttended()
    {
        return $this->schoolAttended;
    }

    /**
     * Set abcPromotionyear
     *
     * @param integer $abcPromotionyear
     * @return Contact
     */
    public function setAbcPromotionyear($abcPromotionyear)
    {
        $this->abcPromotionyear = $abcPromotionyear;
    
        return $this;
    }

    /**
     * Get abcPromotionyear
     *
     * @return integer 
     */
    public function getAbcPromotionyear()
    {
        return $this->abcPromotionyear;
    }

    /**
     * Set homePhonenumber
     *
     * @param string $homePhonenumber
     * @return Contact
     */
    public function setHomePhonenumber($homePhonenumber)
    {
        $this->homePhonenumber = $homePhonenumber;
    
        return $this;
    }

    /**
     * Get homePhonenumber
     *
     * @return string 
     */
    public function getHomePhonenumber()
    {
        return $this->homePhonenumber;
    }

    /**
     * Set mobilePhonenumber
     *
     * @param string $mobilePhonenumber
     * @return Contact
     */
    public function setMobilePhonenumber($mobilePhonenumber)
    {
        $this->mobilePhonenumber = $mobilePhonenumber;
    
        return $this;
    }

    /**
     * Get mobilePhonenumber
     *
     * @return string 
     */
    public function getMobilePhonenumber()
    {
        return $this->mobilePhonenumber;
    }

    /**
     * Set employer
     *
     * @param string $employer
     * @return Contact
     */
    public function setEmployer($employer)
    {
        $this->employer = $employer;
    
        return $this;
    }

    /**
     * Get employer
     *
     * @return string 
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * Set responsible
     *
     * @param string $responsible
     * @return Contact
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
    
        return $this;
    }

    /**
     * Get responsible
     *
     * @return string 
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Contact
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     * @return Contact
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;
    
        return $this;
    }

    /**
     * Get eMail
     *
     * @return string 
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Contact
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
     * @return Contact
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
     * Set isPayer
     *
     * @param string $isPayer
     * @return Contact
     */
    public function setIsPayer($isPayer)
    {
        $this->isPayer = $isPayer;
    
        return $this;
    }

    /**
     * Get isPayer
     *
     * @return string 
     */
    public function getIsPayer()
    {
        return $this->isPayer;
    }

    /**
     * Set applicant
     *
     * @param \ABC\AdmissionBundle\Entity\Applicant $applicant
     * @return Contact
     */
    public function setApplicant(\ABC\AdmissionBundle\Entity\Applicant $applicant = null)
    {
        $this->applicant = $applicant;
    
        return $this;
    }

    /**
     * Get applicant
     *
     * @return \ABC\AdmissionBundle\Entity\Applicant 
     */
    public function getApplicant()
    {
        return $this->applicant;
    }

    /**
     * Set maritalStatus
     *
     * @param \ABC\AdmissionBundle\Entity\MaritalStatus $maritalStatus
     * @return Contact
     */
    public function setMaritalStatus(\ABC\AdmissionBundle\Entity\MaritalStatus $maritalStatus = null)
    {
        $this->maritalStatus = $maritalStatus;
    
        return $this;
    }

    /**
     * Get maritalStatus
     *
     * @return \ABC\AdmissionBundle\Entity\MaritalStatus 
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set relationship
     *
     * @param \ABC\AdmissionBundle\Entity\Relationship $relationship
     * @return Contact
     */
    public function setRelationship(\ABC\AdmissionBundle\Entity\Relationship $relationship = null)
    {
        $this->relationship = $relationship;
    
        return $this;
    }

    /**
     * Get relationship
     *
     * @return \ABC\AdmissionBundle\Entity\Relationship 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }
}