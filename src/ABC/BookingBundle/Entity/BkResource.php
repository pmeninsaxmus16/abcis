<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BkResource
 *
 * @ORM\Table(name="bk_resource")
 * @ORM\Entity
 */
class BkResource
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
     * @ORM\Column(name="name", type="string", length=85, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_before_booking", type="time", nullable=false)
     */
    private $timeBeforeBooking;

    /**
     * @var string
     *
     * @ORM\Column(name="is_active", type="string", nullable=false)
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="timetable_id", type="integer", nullable=true)
     */
    private $timetableId;

    /**
     * @var \BkResourceCategory
     *
     * @ORM\ManyToOne(targetEntity="BkResourceCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;



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
     * @return BkResource
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
     * Set description
     *
     * @param string $description
     * @return BkResource
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return BkResource
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set timeBeforeBooking
     *
     * @param \DateTime $timeBeforeBooking
     * @return BkResource
     */
    public function setTimeBeforeBooking($timeBeforeBooking)
    {
        $this->timeBeforeBooking = $timeBeforeBooking;
    
        return $this;
    }

    /**
     * Get timeBeforeBooking
     *
     * @return \DateTime 
     */
    public function getTimeBeforeBooking()
    {
        return $this->timeBeforeBooking;
    }

    /**
     * Set isActive
     *
     * @param string $isActive
     * @return BkResource
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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return BkResource
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
     * Set timetableId
     *
     * @param integer $timetableId
     * @return BkResource
     */
    public function setTimetableId($timetableId)
    {
        $this->timetableId = $timetableId;
    
        return $this;
    }

    /**
     * Get timetableId
     *
     * @return integer 
     */
    public function getTimetableId()
    {
        return $this->timetableId;
    }

    /**
     * Set category
     *
     * @param \ABC\BookingBundle\Entity\BkResourceCategory $category
     * @return BkResource
     */
    public function setCategory(\ABC\BookingBundle\Entity\BkResourceCategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \ABC\BookingBundle\Entity\BkResourceCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}