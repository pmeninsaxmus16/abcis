<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcSyClass
 *
 * @ORM\Table(name="abc_sy_class")
 * @ORM\Entity
 */
class AbcSyClass
{
    /**
     * @var \AbcClassYear
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcClassYear")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="class_year", referencedColumnName="id")
     * })
     */
    private $classYear;

    /**
     * @var \AbcGrade
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grade", referencedColumnName="id")
     * })
     */
    private $grade;

    /**
     * @var \AbcSchoolYear
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcSchoolYear")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sy", referencedColumnName="id")
     * })
     */
    private $sy;



    /**
     * Set classYear
     *
     * @param \ABC\IsystemBundle\Entity\AbcClassYear $classYear
     * @return AbcSyClass
     */
    public function setClassYear(\ABC\IsystemBundle\Entity\AbcClassYear $classYear)
    {
        $this->classYear = $classYear;
    
        return $this;
    }

    /**
     * Get classYear
     *
     * @return \ABC\IsystemBundle\Entity\AbcClassYear 
     */
    public function getClassYear()
    {
        return $this->classYear;
    }

    /**
     * Set grade
     *
     * @param \ABC\IsystemBundle\Entity\AbcGrade $grade
     * @return AbcSyClass
     */
    public function setGrade(\ABC\IsystemBundle\Entity\AbcGrade $grade)
    {
        $this->grade = $grade;
    
        return $this;
    }

    /**
     * Get grade
     *
     * @return \ABC\IsystemBundle\Entity\AbcGrade 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set sy
     *
     * @param \ABC\IsystemBundle\Entity\AbcSchoolYear $sy
     * @return AbcSyClass
     */
    public function setSy(\ABC\IsystemBundle\Entity\AbcSchoolYear $sy)
    {
        $this->sy = $sy;
    
        return $this;
    }

    /**
     * Get sy
     *
     * @return \ABC\IsystemBundle\Entity\AbcSchoolYear 
     */
    public function getSy()
    {
        return $this->sy;
    }
}