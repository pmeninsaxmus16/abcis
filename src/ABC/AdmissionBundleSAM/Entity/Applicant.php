<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\Applicant
 *
 * @ORM\Table(name="applicant")
 * @ORM\Entity
 */
class Applicant
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
     * @var string $forename
     *
     * @ORM\Column(name="forename", type="string", length=80, nullable=false)
     */
    private $forename;

    /**
     * @var string $middle
     *
     * @ORM\Column(name="middle", type="string", length=80, nullable=false)
     */
    private $middle;

    /**
     * @var date $dob
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string $pob
     *
     * @ORM\Column(name="pob", type="string", length=120, nullable=false)
     */
    private $pob;

    /**
     * @var string $citizenship
     *
     * @ORM\Column(name="citizenship", type="string", length=80, nullable=false)
     */
    private $citizenship;

    /**
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="string", nullable=false)
     */
    private $gender;

    /**
     * @var string $religion
     *
     * @ORM\Column(name="religion", type="string", length=100, nullable=true)
     */
    private $religion;

    /**
     * @var string $firstLanguage
     *
     * @ORM\Column(name="first_language", type="string", length=80, nullable=false)
     */
    private $firstLanguage;

    /**
     * @var string $secondLanguage
     *
     * @ORM\Column(name="second_language", type="string", length=80, nullable=true)
     */
    private $secondLanguage;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;

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
     * @var string $sessionId
     *
     * @ORM\Column(name="session_id", type="string", length=45, nullable=false)
     */
    private $sessionId;

    /**
     * @var string $living
     *
     * @ORM\Column(name="living", type="string", nullable=true)
     */
    private $living;

    /**
     * @var string $entryGrade
     *
     * @ORM\Column(name="entry_grade", type="string", length=45, nullable=true)
     */
    private $entryGrade;

    /**
     * @var Pictures
     *
     * @ORM\ManyToOne(targetEntity="Pictures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo", referencedColumnName="id")
     * })
     */
    private $photo;


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
     * Get surname
     *
     * @return string 
     */
    public function getName()
    {
        return $this->surname.', '.$this->forename;
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
     * Set dob
     *
     * @param date $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * Get dob
     *
     * @return date 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set pob
     *
     * @param string $pob
     */
    public function setPob($pob)
    {
        $this->pob = $pob;
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
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;
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
     */
    public function setFirstLanguage($firstLanguage)
    {
        $this->firstLanguage = $firstLanguage;
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
     */
    public function setSecondLanguage($secondLanguage)
    {
        $this->secondLanguage = $secondLanguage;
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
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * Set sessionId
     *
     * @param string $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
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
     * Set living
     *
     * @param string $living
     */
    public function setLiving($living)
    {
        $this->living = $living;
    }

    /**
     * Get living
     *
     * @return string 
     */
    public function getLiving()
    {
        return $this->living;
    }

    /**
     * Set entryGrade
     *
     * @param string $entryGrade
     */
    public function setEntryGrade($entryGrade)
    {
        $this->entryGrade = $entryGrade;
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
     * Set photo
     *
     * @param ABC\admissionsBundle\Entity\Pictures $photo
     */
    public function setPhoto(\ABC\admissionsBundle\Entity\Pictures $photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get photo
     *
     * @return ABC\admissionsBundle\Entity\Pictures 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}