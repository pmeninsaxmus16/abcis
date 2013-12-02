<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SchoolUseResults
 *
 * @ORM\Table(name="school_use_results")
 * @ORM\Entity
 */
class SchoolUseResults
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
     * @ORM\Column(name="grade", type="string", length=4, nullable=false)
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="recommendation", type="text", nullable=false)
     */
    private $recommendation;

    /**
     * @var \Results
     *
     * @ORM\ManyToOne(targetEntity="Results")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="result", referencedColumnName="id")
     * })
     */
    private $result;

    /**
     * @var \SchoolUseSubject
     *
     * @ORM\ManyToOne(targetEntity="SchoolUseSubject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subject", referencedColumnName="id")
     * })
     */
    private $subject;

    /**
     * @var \SchoolUseAdmin
     *
     * @ORM\ManyToOne(targetEntity="SchoolUseAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="schoolresult_id", referencedColumnName="id")
     * })
     */
    private $schoolresult;



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
     * Set grade
     *
     * @param string $grade
     * @return SchoolUseResults
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    
        return $this;
    }

    /**
     * Get grade
     *
     * @return string 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set recommendation
     *
     * @param string $recommendation
     * @return SchoolUseResults
     */
    public function setRecommendation($recommendation)
    {
        $this->recommendation = $recommendation;
    
        return $this;
    }

    /**
     * Get recommendation
     *
     * @return string 
     */
    public function getRecommendation()
    {
        return $this->recommendation;
    }

    /**
     * Set result
     *
     * @param \ABC\AdmissionBundle\Entity\Results $result
     * @return SchoolUseResults
     */
    public function setResult(\ABC\AdmissionBundle\Entity\Results $result = null)
    {
        $this->result = $result;
    
        return $this;
    }

    /**
     * Get result
     *
     * @return \ABC\AdmissionBundle\Entity\Results 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set subject
     *
     * @param \ABC\AdmissionBundle\Entity\SchoolUseSubject $subject
     * @return SchoolUseResults
     */
    public function setSubject(\ABC\AdmissionBundle\Entity\SchoolUseSubject $subject = null)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return \ABC\AdmissionBundle\Entity\SchoolUseSubject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set schoolresult
     *
     * @param \ABC\AdmissionBundle\Entity\SchoolUseAdmin $schoolresult
     * @return SchoolUseResults
     */
    public function setSchoolresult(\ABC\AdmissionBundle\Entity\SchoolUseAdmin $schoolresult = null)
    {
        $this->schoolresult = $schoolresult;
    
        return $this;
    }

    /**
     * Get schoolresult
     *
     * @return \ABC\AdmissionBundle\Entity\SchoolUseAdmin 
     */
    public function getSchoolresult()
    {
        return $this->schoolresult;
    }
}