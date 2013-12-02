<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BkLinkResourceAdmin
 *
 * @ORM\Table(name="bk_link_resource_admin")
 * @ORM\Entity
 */
class BkLinkResourceAdmin
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
     * @ORM\Column(name="owner", type="string", length=8, nullable=false)
     */
    private $owner;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set owner
     *
     * @param string $owner
     * @return BkLinkResourceAdmin
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return string 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return BkLinkResourceAdmin
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
     * @return BkLinkResourceAdmin
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