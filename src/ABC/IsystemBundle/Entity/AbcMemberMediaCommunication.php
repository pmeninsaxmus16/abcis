<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMemberMediaCommunication
 *
 * @ORM\Table(name="abc_member_media_communication")
 * @ORM\Entity
 */
class AbcMemberMediaCommunication
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
     * @ORM\Column(name="media", type="string", length=180, nullable=false)
     */
    private $media;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \AbcMediaCommunication
     *
     * @ORM\ManyToOne(targetEntity="AbcMediaCommunication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="media_type", referencedColumnName="id")
     * })
     */
    private $mediaType;

    /**
     * @var \AbcMembers
     *
     * @ORM\ManyToOne(targetEntity="AbcMembers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member", referencedColumnName="id")
     * })
     */
    private $member;



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
     * Set media
     *
     * @param string $media
     * @return AbcMemberMediaCommunication
     */
    public function setMedia($media)
    {
        $this->media = $media;
    
        return $this;
    }

    /**
     * Get media
     *
     * @return string 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMemberMediaCommunication
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
     * Set mediaType
     *
     * @param \ABC\IsystemBundle\Entity\AbcMediaCommunication $mediaType
     * @return AbcMemberMediaCommunication
     */
    public function setMediaType(\ABC\IsystemBundle\Entity\AbcMediaCommunication $mediaType = null)
    {
        $this->mediaType = $mediaType;
    
        return $this;
    }

    /**
     * Get mediaType
     *
     * @return \ABC\IsystemBundle\Entity\AbcMediaCommunication 
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcMemberMediaCommunication
     */
    public function setMember(\ABC\IsystemBundle\Entity\AbcMembers $member = null)
    {
        $this->member = $member;
    
        return $this;
    }

    /**
     * Get member
     *
     * @return \ABC\IsystemBundle\Entity\AbcMembers 
     */
    public function getMember()
    {
        return $this->member;
    }
}