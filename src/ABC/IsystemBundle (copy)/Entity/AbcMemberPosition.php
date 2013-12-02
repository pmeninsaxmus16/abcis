<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMemberPosition
 *
 * @ORM\Table(name="abc_member_position")
 * @ORM\Entity
 */
class AbcMemberPosition
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
     * @ORM\Column(name="primary_position", type="string", nullable=false)
     */
    private $primaryPosition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

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
     * @var \AbcPosition
     *
     * @ORM\ManyToOne(targetEntity="AbcPosition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="position", referencedColumnName="id")
     * })
     */
    private $position;



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
     * Set primaryPosition
     *
     * @param string $primaryPosition
     * @return AbcMemberPosition
     */
    public function setPrimaryPosition($primaryPosition)
    {
        $this->primaryPosition = $primaryPosition;
    
        return $this;
    }

    /**
     * Get primaryPosition
     *
     * @return string 
     */
    public function getPrimaryPosition()
    {
        return $this->primaryPosition;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMemberPosition
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
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcMemberPosition
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

    /**
     * Set position
     *
     * @param \ABC\IsystemBundle\Entity\AbcPosition $position
     * @return AbcMemberPosition
     */
    public function setPosition(\ABC\IsystemBundle\Entity\AbcPosition $position = null)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return \ABC\IsystemBundle\Entity\AbcPosition 
     */
    public function getPosition()
    {
        return $this->position;
    }
}