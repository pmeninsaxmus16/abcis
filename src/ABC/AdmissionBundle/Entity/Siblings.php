<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siblings
 *
 * @ORM\Table(name="siblings")
 * @ORM\Entity
 */
class Siblings
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
     * @ORM\Column(name="surname", type="string", length=45, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="forename", type="string", length=45, nullable=false)
     */
    private $forename;

    /**
     * @var string
     *
     * @ORM\Column(name="middle", type="string", length=45, nullable=false)
     */
    private $middle;

    /**
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=45, nullable=false)
     */
    private $grade;

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
     * Set surname
     *
     * @param string $surname
     * @return Siblings
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
     * @return Siblings
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
     * @return Siblings
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
     * Set grade
     *
     * @param string $grade
     * @return Siblings
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
     * Set applicant
     *
     * @param \ABC\AdmissionBundle\Entity\Applicant $applicant
     * @return Siblings
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