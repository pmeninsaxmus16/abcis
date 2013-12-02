<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\Siblings
 *
 * @ORM\Table(name="siblings")
 * @ORM\Entity
 */
class Siblings
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
     * @ORM\Column(name="surname", type="string", length=45, nullable=false)
     */
    private $surname;

    /**
     * @var string $forename
     *
     * @ORM\Column(name="forename", type="string", length=45, nullable=false)
     */
    private $forename;

    /**
     * @var string $middle
     *
     * @ORM\Column(name="middle", type="string", length=45, nullable=false)
     */
    private $middle;

    /**
     * @var string $grade
     *
     * @ORM\Column(name="grade", type="string", length=45, nullable=false)
     */
    private $grade;

    /**
     * @var integer $applicantId
     *
     * @ORM\Column(name="applicant_id", type="integer", nullable=false)
     */
    private $applicantId;



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
     * Set applicantId
     *
     * @param integer $applicantId
     */
    public function setApplicantId($applicantId)
    {
        $this->applicantId = $applicantId;
    }

    /**
     * Get applicantId
     *
     * @return integer 
     */
    public function getApplicantId()
    {
        return $this->applicantId;
    }
}