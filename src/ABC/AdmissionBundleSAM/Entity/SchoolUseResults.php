<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\SchoolUseResults
 *
 * @ORM\Table(name="school_use_results")
 * @ORM\Entity
 */
class SchoolUseResults
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
     * @var string $subject
     *
     * @ORM\Column(name="subject", type="string", nullable=false)
     */
    private $subject;

    /**
     * @var string $grade
     *
     * @ORM\Column(name="grade", type="string", length=4, nullable=false)
     */
    private $grade;

    /**
     * @var text $result
     *
     * @ORM\Column(name="result", type="text", nullable=false)
     */
    private $result;

    /**
     * @var text $recommendation
     *
     * @ORM\Column(name="recommendation", type="text", nullable=false)
     */
    private $recommendation;

    /**
     * @var SchoolUseAdmin
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
     * Set subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set grade
     *
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
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
     * Set result
     *
     * @param text $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Get result
     *
     * @return text 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set recommendation
     *
     * @param text $recommendation
     */
    public function setRecommendation($recommendation)
    {
        $this->recommendation = $recommendation;
    }

    /**
     * Get recommendation
     *
     * @return text 
     */
    public function getRecommendation()
    {
        return $this->recommendation;
    }

    /**
     * Set schoolresult
     *
     * @param ABC\admissionsBundle\Entity\SchoolUseAdmin $schoolresult
     */
    public function setSchoolresult(\ABC\admissionsBundle\Entity\SchoolUseAdmin $schoolresult)
    {
        $this->schoolresult = $schoolresult;
    }

    /**
     * Get schoolresult
     *
     * @return ABC\admissionsBundle\Entity\SchoolUseAdmin 
     */
    public function getSchoolresult()
    {
        return $this->schoolresult;
    }
}