<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\SchoolUseAdmin
 *
 * @ORM\Table(name="school_use_admin")
 * @ORM\Entity
 */
class SchoolUseAdmin
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
     * @var string $testingFeePaid
     *
     * @ORM\Column(name="testing_fee_paid", type="string", nullable=false)
     */
    private $testingFeePaid;

    /**
     * @var text $interviewComments
     *
     * @ORM\Column(name="interview_comments", type="text", nullable=false)
     */
    private $interviewComments;

    /**
     * @var string $interviewer
     *
     * @ORM\Column(name="interviewer", type="string", length=100, nullable=false)
     */
    private $interviewer;

    /**
     * @var string $position
     *
     * @ORM\Column(name="position", type="string", length=100, nullable=false)
     */
    private $position;

    /**
     * @var date $dateOfInterview
     *
     * @ORM\Column(name="date_of_interview", type="date", nullable=false)
     */
    private $dateOfInterview;

    /**
     * @var string $gradeAsigned
     *
     * @ORM\Column(name="grade_asigned", type="string", length=10, nullable=true)
     */
    private $gradeAsigned;

    /**
     * @var string $tribeAsigned
     *
     * @ORM\Column(name="tribe_asigned", type="string", length=10, nullable=true)
     */
    private $tribeAsigned;

    /**
     * @var date $dateToStart
     *
     * @ORM\Column(name="date_to_start", type="date", nullable=true)
     */
    private $dateToStart;

    /**
     * @var string $placeOffered
     *
     * @ORM\Column(name="place_offered", type="string", nullable=false)
     */
    private $placeOffered;

    /**
     * @var text $reason
     *
     * @ORM\Column(name="reason", type="text", nullable=true)
     */
    private $reason;

    /**
     * @var string $headOfSection
     *
     * @ORM\Column(name="head_of_section", type="string", length=100, nullable=false)
     */
    private $headOfSection;

    /**
     * @var datetime $createdDate
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string $ip
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @var string $rstEntrance
     *
     * @ORM\Column(name="rst_entrance", type="string", length=45, nullable=true)
     */
    private $rstEntrance;

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
     * Set testingFeePaid
     *
     * @param string $testingFeePaid
     */
    public function setTestingFeePaid($testingFeePaid)
    {
        $this->testingFeePaid = $testingFeePaid;
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
     * @param text $interviewComments
     */
    public function setInterviewComments($interviewComments)
    {
        $this->interviewComments = $interviewComments;
    }

    /**
     * Get interviewComments
     *
     * @return text 
     */
    public function getInterviewComments()
    {
        return $this->interviewComments;
    }

    /**
     * Set interviewer
     *
     * @param string $interviewer
     */
    public function setInterviewer($interviewer)
    {
        $this->interviewer = $interviewer;
    }

    /**
     * Get interviewer
     *
     * @return string 
     */
    public function getInterviewer()
    {
        return $this->interviewer;
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
     * Set dateOfInterview
     *
     * @param date $dateOfInterview
     */
    public function setDateOfInterview($dateOfInterview)
    {
        $this->dateOfInterview = $dateOfInterview;
    }

    /**
     * Get dateOfInterview
     *
     * @return date 
     */
    public function getDateOfInterview()
    {
        return $this->dateOfInterview;
    }

    /**
     * Set gradeAsigned
     *
     * @param string $gradeAsigned
     */
    public function setGradeAsigned($gradeAsigned)
    {
        $this->gradeAsigned = $gradeAsigned;
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
     */
    public function setTribeAsigned($tribeAsigned)
    {
        $this->tribeAsigned = $tribeAsigned;
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
     * @param date $dateToStart
     */
    public function setDateToStart($dateToStart)
    {
        $this->dateToStart = $dateToStart;
    }

    /**
     * Get dateToStart
     *
     * @return date 
     */
    public function getDateToStart()
    {
        return $this->dateToStart;
    }

    /**
     * Set placeOffered
     *
     * @param string $placeOffered
     */
    public function setPlaceOffered($placeOffered)
    {
        $this->placeOffered = $placeOffered;
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
     * @param text $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * Get reason
     *
     * @return text 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set headOfSection
     *
     * @param string $headOfSection
     */
    public function setHeadOfSection($headOfSection)
    {
        $this->headOfSection = $headOfSection;
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
     * Set rstEntrance
     *
     * @param string $rstEntrance
     */
    public function setRstEntrance($rstEntrance)
    {
        $this->rstEntrance = $rstEntrance;
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
	public function __toString()
	    {
	        
			return $this->getInterviewer();
			return $this->getApplicat();
	    }
	 /**
	  * Set applicant
	  *
	  * @param ABC\admissionsBundle\Entity\Applicant $applicant
	  */
	 public function setDefaultApplicant($applicant)
	 {
	 	$this->applicant = $applicant;
	 }
}