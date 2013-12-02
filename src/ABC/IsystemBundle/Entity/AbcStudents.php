<?php

namespace ABC\IsystemBundle\Entity;

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
     * @ORM\ManyToMany(targetEntity="ExtraCourseSubsession", inversedBy="member")
     * @ORM\JoinTable(name="extra_course_subsession_student",
     *   joinColumns={
     *     @ORM\JoinColumn(name="member", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_course_subsesion", referencedColumnName="id")
     *   }
     * )
     */
    private $idCourseSubsesion;

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
     * @var \AbcMembers
     *
     * @ORM\ManyToOne(targetEntity="AbcMembers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member", referencedColumnName="id")
     * })
     */
    private $member;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCourseSubsesion = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsesion
     * @return AbcStudents
     */
    public function addIdCourseSubsesion(\ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsesion)
    {
        $this->idCourseSubsesion[] = $idCourseSubsesion;
    
        return $this;
    }

    /**
     * Remove idCourseSubsesion
     *
     * @param \ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsesion
     */
    public function removeIdCourseSubsesion(\ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsesion)
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
     * Set tribe
     *
     * @param \ABC\IsystemBundle\Entity\AbcTribe $tribe
     * @return AbcStudents
     */
    public function setTribe(\ABC\IsystemBundle\Entity\AbcTribe $tribe = null)
    {
        $this->tribe = $tribe;
    
        return $this;
    }

    /**
     * Get tribe
     *
     * @return \ABC\IsystemBundle\Entity\AbcTribe 
     */
    public function getTribe()
    {
        return $this->tribe;
    }

    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcStudents
     */
    public function setMember(\ABC\IsystemBundle\Entity\AbcMembers $member = null)
    {
        $this->member = $member;
    
        return $this;
    }

    /**
     * Get member
     *
     * @return \ABC\IsystemBundle\Entity\AbcMembers 
     */
    public function getMember()
    {
        return $this->member;
    }
}