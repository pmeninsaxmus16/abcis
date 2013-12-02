<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcGrade
 *
 * @ORM\Table(name="abc_grade")
 * @ORM\Entity
 */
class AbcGrade
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="academic_order", type="integer", nullable=false)
     */
    private $academicOrder;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcSections", inversedBy="grade")
     * @ORM\JoinTable(name="abc_grade_sections",
     *   joinColumns={
     *     @ORM\JoinColumn(name="grade", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="section", referencedColumnName="id")
     *   }
     * )
     */
    private $section;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ExtraCourseSubsession", mappedBy="idGrade")
     */
    private $idCourseSubsession;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->section = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idCourseSubsession = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return AbcGrade
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set academicOrder
     *
     * @param integer $academicOrder
     * @return AbcGrade
     */
    public function setAcademicOrder($academicOrder)
    {
        $this->academicOrder = $academicOrder;
    
        return $this;
    }

    /**
     * Get academicOrder
     *
     * @return integer 
     */
    public function getAcademicOrder()
    {
        return $this->academicOrder;
    }

    /**
     * Add section
     *
     * @param \ABC\IsystemBundle\Entity\AbcSections $section
     * @return AbcGrade
     */
    public function addSection(\ABC\IsystemBundle\Entity\AbcSections $section)
    {
        $this->section[] = $section;
    
        return $this;
    }

    /**
     * Remove section
     *
     * @param \ABC\IsystemBundle\Entity\AbcSections $section
     */
    public function removeSection(\ABC\IsystemBundle\Entity\AbcSections $section)
    {
        $this->section->removeElement($section);
    }

    /**
     * Get section
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Add idCourseSubsession
     *
     * @param \ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession
     * @return AbcGrade
     */
    public function addIdCourseSubsession(\ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession)
    {
        $this->idCourseSubsession[] = $idCourseSubsession;
    
        return $this;
    }

    /**
     * Remove idCourseSubsession
     *
     * @param \ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession
     */
    public function removeIdCourseSubsession(\ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession)
    {
        $this->idCourseSubsession->removeElement($idCourseSubsession);
    }

    /**
     * Get idCourseSubsession
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCourseSubsession()
    {
        return $this->idCourseSubsession;
    }
}