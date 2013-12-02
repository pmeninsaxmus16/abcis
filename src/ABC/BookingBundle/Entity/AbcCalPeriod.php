<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcCalPeriod
 *
 * @ORM\Table(name="abc_cal_period")
 * @ORM\Entity
 */
class AbcCalPeriod
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
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="date", nullable=false)
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="is_cative", type="string", nullable=true)
     */
    private $isCative;

    /**
     * @var \AbcCal
     *
     * @ORM\ManyToOne(targetEntity="AbcCal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cal", referencedColumnName="id")
     * })
     */
    private $cal;

    /**
     * @var \AbcSchoolYear
     *
     * @ORM\ManyToOne(targetEntity="AbcSchoolYear")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sy", referencedColumnName="id")
     * })
     */
    private $sy;

    /**
     * @var \AbcSections
     *
     * @ORM\ManyToOne(targetEntity="AbcSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="section", referencedColumnName="id")
     * })
     */
    private $section;



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
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return AbcCalPeriod
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    
        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime 
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set isCative
     *
     * @param string $isCative
     * @return AbcCalPeriod
     */
    public function setIsCative($isCative)
    {
        $this->isCative = $isCative;
    
        return $this;
    }

    /**
     * Get isCative
     *
     * @return string 
     */
    public function getIsCative()
    {
        return $this->isCative;
    }

    /**
     * Set cal
     *
     * @param \ABC\BookingBundle\Entity\AbcCal $cal
     * @return AbcCalPeriod
     */
    public function setCal(\ABC\BookingBundle\Entity\AbcCal $cal = null)
    {
        $this->cal = $cal;
    
        return $this;
    }

    /**
     * Get cal
     *
     * @return \ABC\BookingBundle\Entity\AbcCal 
     */
    public function getCal()
    {
        return $this->cal;
    }

    /**
     * Set sy
     *
     * @param \ABC\BookingBundle\Entity\AbcSchoolYear $sy
     * @return AbcCalPeriod
     */
    public function setSy(\ABC\BookingBundle\Entity\AbcSchoolYear $sy = null)
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

    /**
     * Set section
     *
     * @param \ABC\BookingBundle\Entity\AbcSections $section
     * @return AbcCalPeriod
     */
    public function setSection(\ABC\BookingBundle\Entity\AbcSections $section = null)
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