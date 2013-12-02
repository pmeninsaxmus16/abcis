<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMembersPersonalId
 *
 * @ORM\Table(name="abc_members_personal_id")
 * @ORM\Entity
 */
class AbcMembersPersonalId
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
     * @ORM\Column(name="document", type="string", length=45, nullable=false)
     */
    private $document;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \AbcIdType
     *
     * @ORM\ManyToOne(targetEntity="AbcIdType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type", referencedColumnName="id")
     * })
     */
    private $idType;

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
     * Set document
     *
     * @param string $document
     * @return AbcMembersPersonalId
     */
    public function setDocument($document)
    {
        $this->document = $document;
    
        return $this;
    }

    /**
     * Get document
     *
     * @return string 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMembersPersonalId
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
     * Set idType
     *
     * @param \ABC\IsystemBundle\Entity\AbcIdType $idType
     * @return AbcMembersPersonalId
     */
    public function setIdType(\ABC\IsystemBundle\Entity\AbcIdType $idType = null)
    {
        $this->idType = $idType;
    
        return $this;
    }

    /**
     * Get idType
     *
     * @return \ABC\IsystemBundle\Entity\AbcIdType 
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcMembersPersonalId
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