<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMediaCommunication
 *
 * @ORM\Table(name="abc_media_communication")
 * @ORM\Entity
 */
class AbcMediaCommunication
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
     * @ORM\Column(name="media_type", type="string", length=45, nullable=false)
     */
    private $mediaType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;



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
     * Set mediaType
     *
     * @param string $mediaType
     * @return AbcMediaCommunication
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    
        return $this;
    }

    /**
     * Get mediaType
     *
     * @return string 
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMediaCommunication
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
}