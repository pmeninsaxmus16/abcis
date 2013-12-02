<?php

namespace ABC\IsystemBundle\Entity;

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
     * @param \ABC\IsystemBundle\Entity\AbcCal $cal
     * @return AbcCalPeriod
     */
    public function setCal(\ABC\IsystemBundle\Entity\AbcCal $cal = null)
    {
        $this->cal = $cal;
    
        return $this;
    }

    /**
     * Get cal
     *
     * @return \ABC\IsystemBundle\Entity\AbcCal 
     */
    public function getCal()
    {
        return $this->cal;
    }

    /**
     * Set sy
     *
     * @param \ABC\IsystemBundle\Entity\AbcSchoolYear $sy
     * @return AbcCalPeriod
     */
    public function setSy(\ABC\IsystemBundle\Entity\AbcSchoolYear $sy = null)
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

    /**
     * Set section
     *
     * @param \ABC\IsystemBundle\Entity\AbcSections $section
     * @return AbcCalPeriod
     */
    public function setSection(\ABC\IsystemBundle\Entity\AbcSections $section = null)
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