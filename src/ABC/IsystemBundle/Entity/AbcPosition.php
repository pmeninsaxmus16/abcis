<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcPosition
 *
 * @ORM\Table(name="abc_position")
 * @ORM\Entity
 */
class AbcPosition
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
     * @var string
     *
     * @ORM\Column(name="primary_position", type="string", nullable=false)
     */
    private $primaryPosition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcSections", inversedBy="position")
     * @ORM\JoinTable(name="abc_position_section",
     *   joinColumns={
     *     @ORM\JoinColumn(name="position", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="section", referencedColumnName="id")
     *   }
     * )
     */
    private $section;

    /**
     * @var \AbcPosition
     *
     * @ORM\ManyToOne(targetEntity="AbcPosition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="position", referencedColumnName="id")
     * })
     */
    private $position;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->section = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return AbcPosition
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
     * Set primaryPosition
     *
     * @param string $primaryPosition
     * @return AbcPosition
     */
    public function setPrimaryPosition($primaryPosition)
    {
        $this->primaryPosition = $primaryPosition;
    
        return $this;
    }

    /**
     * Get primaryPosition
     *
     * @return string 
     */
    public function getPrimaryPosition()
    {
        return $this->primaryPosition;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcPosition
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
     * Add section
     *
     * @param \ABC\IsystemBundle\Entity\AbcSections $section
     * @return AbcPosition
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
     * Set position
     *
     * @param \ABC\IsystemBundle\Entity\AbcPosition $position
     * @return AbcPosition
     */
    public function setPosition(\ABC\IsystemBundle\Entity\AbcPosition $position = null)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return \ABC\IsystemBundle\Entity\AbcPosition 
     */
    public function getPosition()
    {
        return $this->position;
    }
}