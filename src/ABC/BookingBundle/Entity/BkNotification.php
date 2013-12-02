<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BkNotification
 *
 * @ORM\Table(name="bk_notification")
 * @ORM\Entity
 */
class BkNotification
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
     * @ORM\Column(name="resource_id", type="integer", nullable=false)
     */
    private $resourceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="booking_id", type="integer", nullable=false)
     */
    private $bookingId;

    /**
     * @var integer
     *
     * @ORM\Column(name="event_id", type="integer", nullable=false)
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="performer", type="string", length=8, nullable=false)
     */
    private $performer;

    /**
     * @var string
     *
     * @ORM\Column(name="activity_type", type="string", nullable=false)
     */
    private $activityType;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=16, nullable=false)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=false)
     */
    private $updatedDate;



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
     * Set resourceId
     *
     * @param integer $resourceId
     * @return BkNotification
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    
        return $this;
    }

    /**
     * Get resourceId
     *
     * @return integer 
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return BkNotification
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
     * Set bookingId
     *
     * @param integer $bookingId
     * @return BkNotification
     */
    public function setBookingId($bookingId)
    {
        $this->bookingId = $bookingId;
    
        return $this;
    }

    /**
     * Get bookingId
     *
     * @return integer 
     */
    public function getBookingId()
    {
        return $this->bookingId;
    }

    /**
     * Set eventId
     *
     * @param integer $eventId
     * @return BkNotification
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    
        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set performer
     *
     * @param string $performer
     * @return BkNotification
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
    
        return $this;
    }

    /**
     * Get performer
     *
     * @return string 
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * Set activityType
     *
     * @param string $activityType
     * @return BkNotification
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    
        return $this;
    }

    /**
     * Get activityType
     *
     * @return string 
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return BkNotification
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     * @return BkNotification
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
    
        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime 
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
}