<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcSystems
 *
 * @ORM\Table(name="abc_systems")
 * @ORM\Entity
 */
class AbcSystems
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
     * @ORM\Column(name="namel", type="string", length=80, nullable=false)
     */
    private $namel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="is_active", type="string", nullable=false)
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=80, nullable=true)
     */
    private $url;



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
     * Set namel
     *
     * @param string $namel
     * @return AbcSystems
     */
    public function setNamel($namel)
    {
        $this->namel = $namel;
    
        return $this;
    }

    /**
     * Get namel
     *
     * @return string 
     */
    public function getNamel()
    {
        return $this->namel;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcSystems
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
     * Set isActive
     *
     * @param string $isActive
     * @return AbcSystems
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
     * Set url
     *
     * @param string $url
     * @return AbcSystems
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}