<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SchoolUseAdmin
 *
 * @ORM\Table(name="school_use_admin")
 * @ORM\Entity
 */
class SchoolUseAdmin
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
     * @ORM\Column(name="testing_fee_paid", type="string", length=255, nullable=false)
     */
    private $testingFeePaid;

    /**
     * @var string
     *
     * @ORM\Column(name="interview_comments", type="text", nullable=false)
     */
    private $interviewComments;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=100, nullable=false)
     */
    private $position;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_interview", type="date", nullable=false)
     */
    private $dateOfInterview;

    /**
     * @var string
     *
     * @ORM\Column(name="grade_asigned", type="string", length=10, nullable=true)
     */
    private $gradeAsigned;

    /**
     * @var string
     *
     * @ORM\Column(name="tribe_asigned", type="string", length=10, nullable=true)
     */
    private $tribeAsigned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_to_start", type="date", nullable=true)
     */
    private $dateToStart;

    /**
     * @var string
     *
     * @ORM\Column(name="place_offered", type="string", length=255, nullable=false)
     */
    private $placeOffered;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="text", nullable=true)
     */
    private $reason;

    /**
     * @var string
     *
     * @ORM\Column(name="head_of_section", type="string", length=100, nullable=false)
     */
    private $headOfSection;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="rst_entrance", type="string", length=45, nullable=true)
     */
    private $rstEntrance;

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
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="interviewer", referencedColumnName="id")
     * })
     */
    private $interviewer;



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
     * Set testingFeePaid
     *
     * @param string $testingFeePaid
     * @return SchoolUseAdmin
     */
    public function setTestingFeePaid($testingFeePaid)
    {
        $this->testingFeePaid = $testingFeePaid;
    
        return $this;
    }

    /**
     * Get testingFeePaid
     *
     * @return string 
     */
    public function getTestingFeePaid()
    {
        return $this->testingFeePaid;
    }

    /**
     * Set interviewComments
     *
     * @param string $interviewComments
     * @return SchoolUseAdmin
     */
    public function setInterviewComments($interviewComments)
    {
        $this->interviewComments = $interviewComments;
    
        return $this;
    }

    /**
     * Get interviewComments
     *
     * @return string 
     */
    public function getInterviewComments()
    {
        return $this->interviewComments;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return SchoolUseAdmin
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
     * Set dateOfInterview
     *
     * @param \DateTime $dateOfInterview
     * @return SchoolUseAdmin
     */
    public function setDateOfInterview($dateOfInterview)
    {
        $this->dateOfInterview = $dateOfInterview;
    
        return $this;
    }

    /**
     * Get dateOfInterview
     *
     * @return \DateTime 
     */
    public function getDateOfInterview()
    {
        return $this->dateOfInterview;
    }

    /**
     * Set gradeAsigned
     *
     * @param string $gradeAsigned
     * @return SchoolUseAdmin
     */
    public function setGradeAsigned($gradeAsigned)
    {
        $this->gradeAsigned = $gradeAsigned;
    
        return $this;
    }

    /**
     * Get gradeAsigned
     *
     * @return string 
     */
    public function getGradeAsigned()
    {
        return $this->gradeAsigned;
    }

    /**
     * Set tribeAsigned
     *
     * @param string $tribeAsigned
     * @return SchoolUseAdmin
     */
    public function setTribeAsigned($tribeAsigned)
    {
        $this->tribeAsigned = $tribeAsigned;
    
        return $this;
    }

    /**
     * Get tribeAsigned
     *
     * @return string 
     */
    public function getTribeAsigned()
    {
        return $this->tribeAsigned;
    }

    /**
     * Set dateToStart
     *
     * @param \DateTime $dateToStart
     * @return SchoolUseAdmin
     */
    public function setDateToStart($dateToStart)
    {
        $this->dateToStart = $dateToStart;
    
        return $this;
    }

    /**
     * Get dateToStart
     *
     * @return \DateTime 
     */
    public function getDateToStart()
    {
        return $this->dateToStart;
    }

    /**
     * Set placeOffered
     *
     * @param string $placeOffered
     * @return SchoolUseAdmin
     */
    public function setPlaceOffered($placeOffered)
    {
        $this->placeOffered = $placeOffered;
    
        return $this;
    }

    /**
     * Get placeOffered
     *
     * @return string 
     */
    public function getPlaceOffered()
    {
        return $this->placeOffered;
    }

    /**
     * Set reason
     *
     * @param string $reason
     * @return SchoolUseAdmin
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    
        return $this;
    }

    /**
     * Get reason
     *
     * @return string 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set headOfSection
     *
     * @param string $headOfSection
     * @return SchoolUseAdmin
     */
    public function setHeadOfSection($headOfSection)
    {
        $this->headOfSection = $headOfSection;
    
        return $this;
    }

    /**
     * Get headOfSection
     *
     * @return string 
     */
    public function getHeadOfSection()
    {
        return $this->headOfSection;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return SchoolUseAdmin
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
     * @return SchoolUseAdmin
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
     * Set rstEntrance
     *
     * @param string $rstEntrance
     * @return SchoolUseAdmin
     */
    public function setRstEntrance($rstEntrance)
    {
        $this->rstEntrance = $rstEntrance;
    
        return $this;
    }

    /**
     * Get rstEntrance
     *
     * @return string 
     */
    public function getRstEntrance()
    {
        return $this->rstEntrance;
    }

    /**
     * Set applicant
     *
     * @param \ABC\AdmissionBundle\Entity\Applicant $applicant
     * @return SchoolUseAdmin
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
     * Set interviewer
     *
     * @param \ABC\AdmissionBundle\Entity\Users $interviewer
     * @return SchoolUseAdmin
     */
    public function setInterviewer(\ABC\AdmissionBundle\Entity\Users $interviewer = null)
    {
        $this->interviewer = $interviewer;
    
        return $this;
    }

    /**
     * Get interviewer
     *
     * @return \ABC\AdmissionBundle\Entity\Users 
     */
    public function getInterviewer()
    {
        return $this->interviewer;
    }
}