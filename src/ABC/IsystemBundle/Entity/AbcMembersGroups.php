<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMembersGroups
 *
 * @ORM\Table(name="abc_members_groups")
 * @ORM\Entity
 */
class AbcMembersGroups
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
     * @ORM\Column(name="primary_group", type="string", nullable=false)
     */
    private $primaryGroup;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \AbcGroups
     *
     * @ORM\ManyToOne(targetEntity="AbcGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="other_group", referencedColumnName="id")
     * })
     */
    private $otherGroup;

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
     * Set primaryGroup
     *
     * @param string $primaryGroup
     * @return AbcMembersGroups
     */
    public function setPrimaryGroup($primaryGroup)
    {
        $this->primaryGroup = $primaryGroup;
    
        return $this;
    }

    /**
     * Get primaryGroup
     *
     * @return string 
     */
    public function getPrimaryGroup()
    {
        return $this->primaryGroup;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMembersGroups
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
     * Set otherGroup
     *
     * @param \ABC\IsystemBundle\Entity\AbcGroups $otherGroup
     * @return AbcMembersGroups
     */
    public function setOtherGroup(\ABC\IsystemBundle\Entity\AbcGroups $otherGroup = null)
    {
        $this->otherGroup = $otherGroup;
    
        return $this;
    }

    /**
     * Get otherGroup
     *
     * @return \ABC\IsystemBundle\Entity\AbcGroups 
     */
    public function getOtherGroup()
    {
        return $this->otherGroup;
    }

    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcMembersGroups
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