<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BkBookingevents
 *
 * @ORM\Table(name="bk_bookingevents")
 * @ORM\Entity
 */
class BkBookingevents
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
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time", nullable=false)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time", nullable=false)
     */
    private $endTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bdate", type="date", nullable=false)
     */
    private $bdate;

    /**
     * @var \BkBookingheader
     *
     * @ORM\ManyToOne(targetEntity="BkBookingheader")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="booking_id", referencedColumnName="id")
     * })
     */
    private $booking;

    /**
     * @var \BkResource
     *
     * @ORM\ManyToOne(targetEntity="BkResource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
     * })
     */
    private $resource;



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
     * Set quantity
     *
     * @param integer $quantity
     * @return BkBookingevents
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
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return BkBookingevents
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    
        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return BkBookingevents
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set bdate
     *
     * @param \DateTime $bdate
     * @return BkBookingevents
     */
    public function setBdate($bdate)
    {
        $this->bdate = $bdate;
    
        return $this;
    }

    /**
     * Get bdate
     *
     * @return \DateTime 
     */
    public function getBdate()
    {
        return $this->bdate;
    }

    /**
     * Set booking
     *
     * @param \ABC\BookingBundle\Entity\BkBookingheader $booking
     * @return BkBookingevents
     */
    public function setBooking(\ABC\BookingBundle\Entity\BkBookingheader $booking = null)
    {
        $this->booking = $booking;
    
        return $this;
    }

    /**
     * Get booking
     *
     * @return \ABC\BookingBundle\Entity\BkBookingheader 
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * Set resource
     *
     * @param \ABC\BookingBundle\Entity\BkResource $resource
     * @return BkBookingevents
     */
    public function setResource(\ABC\BookingBundle\Entity\BkResource $resource = null)
    {
        $this->resource = $resource;
    
        return $this;
    }

    /**
     * Get resource
     *
     * @return \ABC\BookingBundle\Entity\BkResource 
     */
    public function getResource()
    {
        return $this->resource;
    }
}