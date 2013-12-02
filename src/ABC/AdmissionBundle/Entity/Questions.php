<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Questions
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
     * @ORM\Column(name="answer_1", type="string", length=255, nullable=false)
     */
    private $answer1;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_2", type="string", length=255, nullable=false)
     */
    private $answer2;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_3", type="string", length=255, nullable=false)
     */
    private $answer3;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_4", type="string", length=255, nullable=false)
     */
    private $answer4;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_5", type="text", nullable=true)
     */
    private $answer5;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_6", type="text", nullable=false)
     */
    private $answer6;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_7", type="text", nullable=false)
     */
    private $answer7;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

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
     * Set answer1
     *
     * @param string $answer1
     * @return Questions
     */
    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;
    
        return $this;
    }

    /**
     * Get answer1
     *
     * @return string 
     */
    public function getAnswer1()
    {
        return $this->answer1;
    }

    /**
     * Set answer2
     *
     * @param string $answer2
     * @return Questions
     */
    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;
    
        return $this;
    }

    /**
     * Get answer2
     *
     * @return string 
     */
    public function getAnswer2()
    {
        return $this->answer2;
    }

    /**
     * Set answer3
     *
     * @param string $answer3
     * @return Questions
     */
    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;
    
        return $this;
    }

    /**
     * Get answer3
     *
     * @return string 
     */
    public function getAnswer3()
    {
        return $this->answer3;
    }

    /**
     * Set answer4
     *
     * @param string $answer4
     * @return Questions
     */
    public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;
    
        return $this;
    }

    /**
     * Get answer4
     *
     * @return string 
     */
    public function getAnswer4()
    {
        return $this->answer4;
    }

    /**
     * Set answer5
     *
     * @param string $answer5
     * @return Questions
     */
    public function setAnswer5($answer5)
    {
        $this->answer5 = $answer5;
    
        return $this;
    }

    /**
     * Get answer5
     *
     * @return string 
     */
    public function getAnswer5()
    {
        return $this->answer5;
    }

    /**
     * Set answer6
     *
     * @param string $answer6
     * @return Questions
     */
    public function setAnswer6($answer6)
    {
        $this->answer6 = $answer6;
    
        return $this;
    }

    /**
     * Get answer6
     *
     * @return string 
     */
    public function getAnswer6()
    {
        return $this->answer6;
    }

    /**
     * Set answer7
     *
     * @param string $answer7
     * @return Questions
     */
    public function setAnswer7($answer7)
    {
        $this->answer7 = $answer7;
    
        return $this;
    }

    /**
     * Get answer7
     *
     * @return string 
     */
    public function getAnswer7()
    {
        return $this->answer7;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Questions
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
     * Set applicant
     *
     * @param \ABC\AdmissionBundle\Entity\Applicant $applicant
     * @return Questions
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