<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcCity
 *
 * @ORM\Table(name="abc_city")
 * @ORM\Entity
 */
class AbcCity
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
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \AbcDepartment
     *
     * @ORM\ManyToOne(targetEntity="AbcDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department", referencedColumnName="id")
     * })
     */
    private $department;



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
     * @return AbcCity
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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcCity
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
     * Set department
     *
     * @param \ABC\BookingBundle\Entity\AbcDepartment $department
     * @return AbcCity
     */
    public function setDepartment(\ABC\BookingBundle\Entity\AbcDepartment $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return \ABC\BookingBundle\Entity\AbcDepartment 
     */
    public function getDepartment()
    {
        return $this->department;
    }
}