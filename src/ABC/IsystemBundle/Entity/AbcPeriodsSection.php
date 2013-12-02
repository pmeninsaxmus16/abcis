<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcPeriodsSection
 *
 * @ORM\Table(name="abc_periods_section")
 * @ORM\Entity
 */
class AbcPeriodsSection
{
    /**
     * @var \AbcBellTimes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcBellTimes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="time", referencedColumnName="id")
     * })
     */
    private $time;

    /**
     * @var \AbcSchoolPeriods
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcSchoolPeriods")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="period", referencedColumnName="id")
     * })
     */
    private $period;

    /**
     * @var \AbcSections
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="section", referencedColumnName="id")
     * })
     */
    private $section;



    /**
     * Set time
     *
     * @param \ABC\IsystemBundle\Entity\AbcBellTimes $time
     * @return AbcPeriodsSection
     */
    public function setTime(\ABC\IsystemBundle\Entity\AbcBellTimes $time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return \ABC\IsystemBundle\Entity\AbcBellTimes 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set period
     *
     * @param \ABC\IsystemBundle\Entity\AbcSchoolPeriods $period
     * @return AbcPeriodsSection
     */
    public function setPeriod(\ABC\IsystemBundle\Entity\AbcSchoolPeriods $period)
    {
        $this->period = $period;
    
        return $this;
    }

    /**
     * Get period
     *
     * @return \ABC\IsystemBundle\Entity\AbcSchoolPeriods 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set section
     *
     * @param \ABC\IsystemBundle\Entity\AbcSections $section
     * @return AbcPeriodsSection
     */
    public function setSection(\ABC\IsystemBundle\Entity\AbcSections $section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return \ABC\IsystemBundle\Entity\AbcSections 
     */
    public function getSection()
    {
        return $this->section;
    }
}