<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BkLinkResourceRoom
 *
 * @ORM\Table(name="bk_link_resource_room")
 * @ORM\Entity
 */
class BkLinkResourceRoom
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
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

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
     * @var \BkRoom
     *
     * @ORM\ManyToOne(targetEntity="BkRoom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     * })
     */
    private $room;



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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return BkLinkResourceRoom
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
     * Set resource
     *
     * @param \ABC\BookingBundle\Entity\BkResource $resource
     * @return BkLinkResourceRoom
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

    /**
     * Set room
     *
     * @param \ABC\BookingBundle\Entity\BkRoom $room
     * @return BkLinkResourceRoom
     */
    public function setRoom(\ABC\BookingBundle\Entity\BkRoom $room = null)
    {
        $this->room = $room;
    
        return $this;
    }

    /**
     * Get room
     *
     * @return \ABC\BookingBundle\Entity\BkRoom 
     */
    public function getRoom()
    {
        return $this->room;
    }
}