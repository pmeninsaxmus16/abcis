<?php

namespace ABC\BookingBundle\Entity;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcMembers", inversedBy="mediaType")
     * @ORM\JoinTable(name="abc_member_media_communication",
     *   joinColumns={
     *     @ORM\JoinColumn(name="media_type", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_card", referencedColumnName="id_card")
     *   }
     * )
     */
    private $idCard;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCard = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     * @return AbcMediaCommunication
     */
    public function addIdCard(\ABC\BookingBundle\Entity\AbcMembers $idCard)
    {
        $this->idCard[] = $idCard;
    
        return $this;
    }

    /**
     * Remove idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     */
    public function removeIdCard(\ABC\BookingBundle\Entity\AbcMembers $idCard)
    {
        $this->idCard->removeElement($idCard);
    }

    /**
     * Get idCard
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }
}