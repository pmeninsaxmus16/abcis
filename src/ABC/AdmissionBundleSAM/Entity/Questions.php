<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Questions
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
     * @var string $answer1
     *
     * @ORM\Column(name="answer_1", type="string", nullable=false)
     */
    private $answer1;

    /**
     * @var string $answer2
     *
     * @ORM\Column(name="answer_2", type="string", nullable=false)
     */
    private $answer2;

    /**
     * @var string $answer3
     *
     * @ORM\Column(name="answer_3", type="string", nullable=false)
     */
    private $answer3;

    /**
     * @var string $answer4
     *
     * @ORM\Column(name="answer_4", type="string", nullable=false)
     */
    private $answer4;

    /**
     * @var text $answer5
     *
     * @ORM\Column(name="answer_5", type="text", nullable=true)
     */
    private $answer5;

    /**
     * @var text $answer6
     *
     * @ORM\Column(name="answer_6", type="text", nullable=false)
     */
    private $answer6;

    /**
     * @var text $answer7
     *
     * @ORM\Column(name="answer_7", type="text", nullable=false)
     */
    private $answer7;

    /**
     * @var datetime $createdDate
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

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
     * Set answer1
     *
     * @param string $answer1
     */
    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;
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
     */
    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;
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
     */
    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;
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
     */
    public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;
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
     * @param text $answer5
     */
    public function setAnswer5($answer5)
    {
        $this->answer5 = $answer5;
    }

    /**
     * Get answer5
     *
     * @return text 
     */
    public function getAnswer5()
    {
        return $this->answer5;
    }

    /**
     * Set answer6
     *
     * @param text $answer6
     */
    public function setAnswer6($answer6)
    {
        $this->answer6 = $answer6;
    }

    /**
     * Get answer6
     *
     * @return text 
     */
    public function getAnswer6()
    {
        return $this->answer6;
    }

    /**
     * Set answer7
     *
     * @param text $answer7
     */
    public function setAnswer7($answer7)
    {
        $this->answer7 = $answer7;
    }

    /**
     * Get answer7
     *
     * @return text 
     */
    public function getAnswer7()
    {
        return $this->answer7;
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