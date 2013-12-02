<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $surname
     *
     * @ORM\Column(name="surname", type="string", length=80, nullable=false)
     */
    private $surname;

    /**
     * @var string $middle
     *
     * @ORM\Column(name="middle", type="string", length=80, nullable=true)
     */
    private $middle;

    /**
     * @var string $forename
     *
     * @ORM\Column(name="forename", type="string", length=80, nullable=false)
     */
    private $forename;

    /**
     * @var string $idType
     *
     * @ORM\Column(name="id_type", type="string", nullable=false)
     */
    private $idType;

    /**
     * @var string $idNumber
     *
     * @ORM\Column(name="id_number", type="string", length=20, nullable=false)
     */
    private $idNumber;

    /**
     * @var string $citizenship
     *
     * @ORM\Column(name="citizenship", type="string", length=100, nullable=false)
     */
    private $citizenship;

    /**
     * @var string $languagesSpoken
     *
     * @ORM\Column(name="languages_spoken", type="string", length=255, nullable=false)
     */
    private $languagesSpoken;

    /**
     * @var string $schoolAttended
     *
     * @ORM\Column(name="school_attended", type="string", length=100, nullable=false)
     */
    private $schoolAttended;

    /**
     * @var integer $abcPromotionyear
     *
     * @ORM\Column(name="abc_promotionyear", type="integer", nullable=false)
     */
    private $abcPromotionyear;

    /**
     * @var string $maritalStatus
     *
     * @ORM\Column(name="marital_status", type="string", nullable=false)
     */
    private $maritalStatus;

    /**
     * @var string $homePhonenumber
     *
     * @ORM\Column(name="home_phonenumber", type="string", length=15, nullable=true)
     */
    private $homePhonenumber;

    /**
     * @var string $mobilePhonenumber
     *
     * @ORM\Column(name="mobile_phonenumber", type="string", length=15, nullable=true)
     */
    private $mobilePhonenumber;

    /**
     * @var string $employer
     *
     * @ORM\Column(name="employer", type="string", length=150, nullable=true)
     */
    private $employer;

    /**
     * @var string $relationship
     *
     * @ORM\Column(name="relationship", type="string", nullable=false)
     */
    private $relationship;

    /**
     * @var string $responsible
     *
     * @ORM\Column(name="responsible", type="string", nullable=false)
     */
    private $responsible;

    /**
     * @var string $position
     *
     * @ORM\Column(name="position", type="string", length=100, nullable=true)
     */
    private $position;

    /**
     * @var string $eMail
     *
     * @ORM\Column(name="e_mail", type="string", length=80, nullable=true)
     */
    private $eMail;

    /**
     * @var datetime $createdDate
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string $ip
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=false)
     */
    private $ip;

    /**
     * @var string $isPayer
     *
     * @ORM\Column(name="is_payer", type="string", nullable=true)
     */
    private $isPayer;

    /**
     * @var Applicant
     *
     * @ORM\ManyToOne(targetEntity="Applicant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="applicant_id", referencedColumnName="id")
     * })
     */
    private $applicant;



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
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
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
     */
    public function setMiddle($middle)
    {
        $this->middle = $middle;
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
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
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
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;
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
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
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
     */
    public function setCitizenship($citizenship)
    {
        $this->citizenship = $citizenship;
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
     */
    public function setLanguagesSpoken($languagesSpoken)
    {
        $this->languagesSpoken = $languagesSpoken;
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
     */
    public function setSchoolAttended($schoolAttended)
    {
        $this->schoolAttended = $schoolAttended;
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
     */
    public function setAbcPromotionyear($abcPromotionyear)
    {
        $this->abcPromotionyear = $abcPromotionyear;
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
     * Set maritalStatus
     *
     * @param string $maritalStatus
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;
    }

    /**
     * Get maritalStatus
     *
     * @return string 
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set homePhonenumber
     *
     * @param string $homePhonenumber
     */
    public function setHomePhonenumber($homePhonenumber)
    {
        $this->homePhonenumber = $homePhonenumber;
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
     */
    public function setMobilePhonenumber($mobilePhonenumber)
    {
        $this->mobilePhonenumber = $mobilePhonenumber;
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
     */
    public function setEmployer($employer)
    {
        $this->employer = $employer;
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
     * Set relationship
     *
     * @param string $relationship
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    }

    /**
     * Get relationship
     *
     * @return string 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set responsible
     *
     * @param string $responsible
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
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
     */
    public function setPosition($position)
    {
        $this->position = $position;
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
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;
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
     * @param datetime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set ip
     *
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
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
     */
    public function setIsPayer($isPayer)
    {
        $this->isPayer = $isPayer;
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
     * @param ABC\admissionsBundle\Entity\Applicant $applicant
     */
    public function setApplicant(\ABC\admissionsBundle\Entity\Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Get applicant
     *
     * @return ABC\admissionsBundle\Entity\Applicant 
     */
    public function getApplicant()
    {
        return $this->applicant;
    }
}