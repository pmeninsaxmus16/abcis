<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SchoolRecord
 *
 * @ORM\Table(name="school_record")
 * @ORM\Entity
 */
class SchoolRecord
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
     * @ORM\Column(name="school_name", type="string", length=150, nullable=false)
     */
    private $schoolName;

    /**
     * @var string
     *
     * @ORM\Column(name="from_date", type="string", length=10, nullable=false)
     */
    private $fromDate;

    /**
     * @var string
     *
     * @ORM\Column(name="to_date", type="string", length=10, nullable=false)
     */
    private $toDate;

    /**
     * @var string
     *
     * @ORM\Column(name="head_name", type="string", length=160, nullable=false)
     */
    private $headName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=15, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="e_mail", type="string", length=80, nullable=true)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="is_current", type="string", length=255, nullable=false)
     */
    private $isCurrent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="id")
     * })
     */
    private $address;

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
     * @return SchoolRecord
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    
        return $this;
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
     * @return SchoolRecord
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    
        return $this;
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
     * @return SchoolRecord
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    
        return $this;
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
     * @return SchoolRecord
     */
    public function setHeadName($headName)
    {
        $this->headName = $headName;
    
        return $this;
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
     * @return SchoolRecord
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    
        return $this;
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
     * @return SchoolRecord
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
     * Set isCurrent
     *
     * @param string $isCurrent
     * @return SchoolRecord
     */
    public function setIsCurrent($isCurrent)
    {
        $this->isCurrent = $isCurrent;
    
        return $this;
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
     * @param \DateTime $createdDate
     * @return SchoolRecord
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
     * Set address
     *
     * @param \ABC\AdmissionBundle\Entity\Addresses $address
     * @return SchoolRecord
     */
    public function setAddress(\ABC\AdmissionBundle\Entity\Addresses $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \ABC\AdmissionBundle\Entity\Addresses 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set applicant
     *
     * @param \ABC\AdmissionBundle\Entity\Applicant $applicant
     * @return SchoolRecord
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
}