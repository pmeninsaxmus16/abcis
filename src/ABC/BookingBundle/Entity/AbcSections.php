<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcSections
 *
 * @ORM\Table(name="abc_sections")
 * @ORM\Entity
 */
class AbcSections
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
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=false)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="is_active", type="string", nullable=false)
     */
    private $isActive;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcGrade", mappedBy="section")
     */
    private $grade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcPosition", mappedBy="section")
     */
    private $position;

    /**
     * @var \AbcSections
     *
     * @ORM\ManyToOne(targetEntity="AbcSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     * })
     */
    private $section;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grade = new \Doctrine\Common\Collections\ArrayCollection();
        $this->position = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return AbcSections
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
     * Set weight
     *
     * @param integer $weight
     * @return AbcSections
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set isActive
     *
     * @param string $isActive
     * @return AbcSections
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return string 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add grade
     *
     * @param \ABC\BookingBundle\Entity\AbcGrade $grade
     * @return AbcSections
     */
    public function addGrade(\ABC\BookingBundle\Entity\AbcGrade $grade)
    {
        $this->grade[] = $grade;
    
        return $this;
    }

    /**
     * Remove grade
     *
     * @param \ABC\BookingBundle\Entity\AbcGrade $grade
     */
    public function removeGrade(\ABC\BookingBundle\Entity\AbcGrade $grade)
    {
        $this->grade->removeElement($grade);
    }

    /**
     * Get grade
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Add position
     *
     * @param \ABC\BookingBundle\Entity\AbcPosition $position
     * @return AbcSections
     */
    public function addPosition(\ABC\BookingBundle\Entity\AbcPosition $position)
    {
        $this->position[] = $position;
    
        return $this;
    }

    /**
     * Remove position
     *
     * @param \ABC\BookingBundle\Entity\AbcPosition $position
     */
    public function removePosition(\ABC\BookingBundle\Entity\AbcPosition $position)
    {
        $this->position->removeElement($position);
    }

    /**
     * Get position
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set section
     *
     * @param \ABC\BookingBundle\Entity\AbcSections $section
     * @return AbcSections
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