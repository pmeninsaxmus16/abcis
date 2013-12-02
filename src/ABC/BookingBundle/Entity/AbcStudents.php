<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcStudents
 *
 * @ORM\Table(name="abc_students")
 * @ORM\Entity
 */
class AbcStudents
{
    /**
     * @var string
     *
     * @ORM\Column(name="class_year", type="string", length=45, nullable=false)
     */
    private $classYear;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ExtraCourseSubsession", inversedBy="idCard")
     * @ORM\JoinTable(name="extra_course_subsession_student",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_card", referencedColumnName="id_card")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_course_subsesion", referencedColumnName="id")
     *   }
     * )
     */
    private $idCourseSubsesion;

    /**
     * @var \AbcMembers
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcMembers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_card", referencedColumnName="id_card")
     * })
     */
    private $idCard;

    /**
     * @var \AbcTribe
     *
     * @ORM\ManyToOne(targetEntity="AbcTribe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tribe", referencedColumnName="id")
     * })
     */
    private $tribe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCourseSubsesion = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set classYear
     *
     * @param string $classYear
     * @return AbcStudents
     */
    public function setClassYear($classYear)
    {
        $this->classYear = $classYear;
    
        return $this;
    }

    /**
     * Get classYear
     *
     * @return string 
     */
    public function getClassYear()
    {
        return $this->classYear;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcStudents
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
     * Add idCourseSubsesion
     *
     * @param \ABC\BookingBundle\Entity\ExtraCourseSubsession $idCourseSubsesion
     * @return AbcStudents
     */
    public function addIdCourseSubsesion(\ABC\BookingBundle\Entity\ExtraCourseSubsession $idCourseSubsesion)
    {
        $this->idCourseSubsesion[] = $idCourseSubsesion;
    
        return $this;
    }

    /**
     * Remove idCourseSubsesion
     *
     * @param \ABC\BookingBundle\Entity\ExtraCourseSubsession $idCourseSubsesion
     */
    public function removeIdCourseSubsesion(\ABC\BookingBundle\Entity\ExtraCourseSubsession $idCourseSubsesion)
    {
        $this->idCourseSubsesion->removeElement($idCourseSubsesion);
    }

    /**
     * Get idCourseSubsesion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCourseSubsesion()
    {
        return $this->idCourseSubsesion;
    }

    /**
     * Set idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     * @return AbcStudents
     */
    public function setIdCard(\ABC\BookingBundle\Entity\AbcMembers $idCard)
    {
        $this->idCard = $idCard;
    
        return $this;
    }

    /**
     * Get idCard
     *
     * @return \ABC\BookingBundle\Entity\AbcMembers 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set tribe
     *
     * @param \ABC\BookingBundle\Entity\AbcTribe $tribe
     * @return AbcStudents
     */
    public function setTribe(\ABC\BookingBundle\Entity\AbcTribe $tribe = null)
    {
        $this->tribe = $tribe;
    
        return $this;
    }

    /**
     * Get tribe
     *
     * @return \ABC\BookingBundle\Entity\AbcTribe 
     */
    public function getTribe()
    {
        return $this->tribe;
    }
}