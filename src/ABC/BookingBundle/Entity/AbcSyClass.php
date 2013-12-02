<?php

namespace ABC\BookingBundle\Entity;

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
     * @param \ABC\BookingBundle\Entity\AbcClassYear $classYear
     * @return AbcSyClass
     */
    public function setClassYear(\ABC\BookingBundle\Entity\AbcClassYear $classYear)
    {
        $this->classYear = $classYear;
    
        return $this;
    }

    /**
     * Get classYear
     *
     * @return \ABC\BookingBundle\Entity\AbcClassYear 
     */
    public function getClassYear()
    {
        return $this->classYear;
    }

    /**
     * Set grade
     *
     * @param \ABC\BookingBundle\Entity\AbcGrade $grade
     * @return AbcSyClass
     */
    public function setGrade(\ABC\BookingBundle\Entity\AbcGrade $grade)
    {
        $this->grade = $grade;
    
        return $this;
    }

    /**
     * Get grade
     *
     * @return \ABC\BookingBundle\Entity\AbcGrade 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set sy
     *
     * @param \ABC\BookingBundle\Entity\AbcSchoolYear $sy
     * @return AbcSyClass
     */
    public function setSy(\ABC\BookingBundle\Entity\AbcSchoolYear $sy)
    {
        $this->sy = $sy;
    
        return $this;
    }

    /**
     * Get sy
     *
     * @return \ABC\BookingBundle\Entity\AbcSchoolYear 
     */
    public function getSy()
    {
        return $this->sy;
    }
}