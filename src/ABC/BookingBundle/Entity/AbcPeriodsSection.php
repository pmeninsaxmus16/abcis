<?php

namespace ABC\BookingBundle\Entity;

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
     * @param \ABC\BookingBundle\Entity\AbcBellTimes $time
     * @return AbcPeriodsSection
     */
    public function setTime(\ABC\BookingBundle\Entity\AbcBellTimes $time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return \ABC\BookingBundle\Entity\AbcBellTimes 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set period
     *
     * @param \ABC\BookingBundle\Entity\AbcSchoolPeriods $period
     * @return AbcPeriodsSection
     */
    public function setPeriod(\ABC\BookingBundle\Entity\AbcSchoolPeriods $period)
    {
        $this->period = $period;
    
        return $this;
    }

    /**
     * Get period
     *
     * @return \ABC\BookingBundle\Entity\AbcSchoolPeriods 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set section
     *
     * @param \ABC\BookingBundle\Entity\AbcSections $section
     * @return AbcPeriodsSection
     */
    public function setSection(\ABC\BookingBundle\Entity\AbcSections $section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return \ABC\BookingBundle\Entity\AbcSections 
     */
    public function getSection()
    {
        return $this->section;
    }
}