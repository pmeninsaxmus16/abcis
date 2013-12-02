<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraCourseSubsession
 *
 * @ORM\Table(name="extra_course_subsession")
 * @ORM\Entity
 */
class ExtraCourseSubsession
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
     * @var integer
     *
     * @ORM\Column(name="max_members", type="integer", nullable=false)
     */
    private $maxMembers;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", nullable=false)
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ExtraDay", mappedBy="idCourseSubsession")
     */
    private $idDay;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcGrade", inversedBy="idCourseSubsession")
     * @ORM\JoinTable(name="extra_course_subsession_grade",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_course_subsession", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_grade", referencedColumnName="id")
     *   }
     * )
     */
    private $idGrade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcStudents", mappedBy="idCourseSubsesion")
     */
    private $idCard;

    /**
     * @var \ExtraCourse
     *
     * @ORM\ManyToOne(targetEntity="ExtraCourse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_course", referencedColumnName="id")
     * })
     */
    private $idCourse;

    /**
     * @var \ExtraSubsession
     *
     * @ORM\ManyToOne(targetEntity="ExtraSubsession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_subsession", referencedColumnName="id")
     * })
     */
    private $idSubsession;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idDay = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idGrade = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idCard = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set maxMembers
     *
     * @param integer $maxMembers
     * @return ExtraCourseSubsession
     */
    public function setMaxMembers($maxMembers)
    {
        $this->maxMembers = $maxMembers;
    
        return $this;
    }

    /**
     * Get maxMembers
     *
     * @return integer 
     */
    public function getMaxMembers()
    {
        return $this->maxMembers;
    }

    /**
     * Set active
     *
     * @param string $active
     * @return ExtraCourseSubsession
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add idDay
     *
     * @param \ABC\BookingBundle\Entity\ExtraDay $idDay
     * @return ExtraCourseSubsession
     */
    public function addIdDay(\ABC\BookingBundle\Entity\ExtraDay $idDay)
    {
        $this->idDay[] = $idDay;
    
        return $this;
    }

    /**
     * Remove idDay
     *
     * @param \ABC\BookingBundle\Entity\ExtraDay $idDay
     */
    public function removeIdDay(\ABC\BookingBundle\Entity\ExtraDay $idDay)
    {
        $this->idDay->removeElement($idDay);
    }

    /**
     * Get idDay
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdDay()
    {
        return $this->idDay;
    }

    /**
     * Add idGrade
     *
     * @param \ABC\BookingBundle\Entity\AbcGrade $idGrade
     * @return ExtraCourseSubsession
     */
    public function addIdGrade(\ABC\BookingBundle\Entity\AbcGrade $idGrade)
    {
        $this->idGrade[] = $idGrade;
    
        return $this;
    }

    /**
     * Remove idGrade
     *
     * @param \ABC\BookingBundle\Entity\AbcGrade $idGrade
     */
    public function removeIdGrade(\ABC\BookingBundle\Entity\AbcGrade $idGrade)
    {
        $this->idGrade->removeElement($idGrade);
    }

    /**
     * Get idGrade
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdGrade()
    {
        return $this->idGrade;
    }

    /**
     * Add idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcStudents $idCard
     * @return ExtraCourseSubsession
     */
    public function addIdCard(\ABC\BookingBundle\Entity\AbcStudents $idCard)
    {
        $this->idCard[] = $idCard;
    
        return $this;
    }

    /**
     * Remove idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcStudents $idCard
     */
    public function removeIdCard(\ABC\BookingBundle\Entity\AbcStudents $idCard)
    {
        $this->idCard->removeElement($idCard);
    }

    /**
     * Get idCard
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set idCourse
     *
     * @param \ABC\BookingBundle\Entity\ExtraCourse $idCourse
     * @return ExtraCourseSubsession
     */
    public function setIdCourse(\ABC\BookingBundle\Entity\ExtraCourse $idCourse = null)
    {
        $this->idCourse = $idCourse;
    
        return $this;
    }

    /**
     * Get idCourse
     *
     * @return \ABC\BookingBundle\Entity\ExtraCourse 
     */
    public function getIdCourse()
    {
        return $this->idCourse;
    }

    /**
     * Set idSubsession
     *
     * @param \ABC\BookingBundle\Entity\ExtraSubsession $idSubsession
     * @return ExtraCourseSubsession
     */
    public function setIdSubsession(\ABC\BookingBundle\Entity\ExtraSubsession $idSubsession = null)
    {
        $this->idSubsession = $idSubsession;
    
        return $this;
    }

    /**
     * Get idSubsession
     *
     * @return \ABC\BookingBundle\Entity\ExtraSubsession 
     */
    public function getIdSubsession()
    {
        return $this->idSubsession;
    }
}