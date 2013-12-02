<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcSchoolPeriods
 *
 * @ORM\Table(name="abc_school_periods")
 * @ORM\Entity
 */
class AbcSchoolPeriods
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_name", type="datetime", nullable=false)
     */
    private $createdName;



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
     * @return AbcSchoolPeriods
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
     * Set createdName
     *
     * @param \DateTime $createdName
     * @return AbcSchoolPeriods
     */
    public function setCreatedName($createdName)
    {
        $this->createdName = $createdName;
    
        return $this;
    }

    /**
     * Get createdName
     *
     * @return \DateTime 
     */
    public function getCreatedName()
    {
        return $this->createdName;
    }
}