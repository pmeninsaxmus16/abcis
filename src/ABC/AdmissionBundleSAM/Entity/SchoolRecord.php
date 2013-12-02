<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\SchoolRecord
 *
 * @ORM\Table(name="school_record")
 * @ORM\Entity
 */
class SchoolRecord
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
     * @var string $schoolName
     *
     * @ORM\Column(name="school_name", type="string", length=150, nullable=false)
     */
    private $schoolName;

    /**
     * @var string $fromDate
     *
     * @ORM\Column(name="from_date", type="string", length=10, nullable=false)
     */
    private $fromDate;

    /**
     * @var string $toDate
     *
     * @ORM\Column(name="to_date", type="string", length=10, nullable=false)
     */
    private $toDate;

    /**
     * @var string $headName
     *
     * @ORM\Column(name="head_name", type="string", length=160, nullable=false)
     */
    private $headName;

    /**
     * @var string $phoneNumber
     *
     * @ORM\Column(name="phone_number", type="string", length=15, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string $eMail
     *
     * @ORM\Column(name="e_mail", type="string", length=80, nullable=true)
     */
    private $eMail;

    /**
     * @var string $isCurrent
     *
     * @ORM\Column(name="is_current", type="string", nullable=false)
     */
    private $isCurrent;

    /**
     * @var datetime $createdDate
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="id")
     * })
     */
    private $address;

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
     * Set schoolName
     *
     * @param string $schoolName
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    }

    /**
     * Get schoolName
     *
     * @return string 
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * Set fromDate
     *
     * @param string $fromDate
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * Get fromDate
     *
     * @return string 
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Set toDate
     *
     * @param string $toDate
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    /**
     * Get toDate
     *
     * @return string 
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * Set headName
     *
     * @param string $headName
     */
    public function setHeadName($headName)
    {
        $this->headName = $headName;
    }

    /**
     * Get headName
     *
     * @return string 
     */
    public function getHeadName()
    {
        return $this->headName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
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
     * Set isCurrent
     *
     * @param string $isCurrent
     */
    public function setIsCurrent($isCurrent)
    {
        $this->isCurrent = $isCurrent;
    }

    /**
     * Get isCurrent
     *
     * @return string 
     */
    public function getIsCurrent()
    {
        return $this->isCurrent;
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
     * Set address
     *
     * @param ABC\admissionsBundle\Entity\Addresses $address
     */
    public function setAddress(\ABC\admissionsBundle\Entity\Addresses $address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return ABC\admissionsBundle\Entity\Addresses 
     */
    public function getAddress()
    {
        return $this->address;
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