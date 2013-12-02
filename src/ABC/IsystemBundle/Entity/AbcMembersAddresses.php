<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMembersAddresses
 *
 * @ORM\Table(name="abc_members_addresses")
 * @ORM\Entity
 */
class AbcMembersAddresses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="member", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $member;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \AbcAddresses
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcAddresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="adresses", referencedColumnName="id")
     * })
     */
    private $adresses;



    /**
     * Set member
     *
     * @param integer $member
     * @return AbcMembersAddresses
     */
    public function setMember($member)
    {
        $this->member = $member;
    
        return $this;
    }

    /**
     * Get member
     *
     * @return integer 
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcMembersAddresses
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
     * Set adresses
     *
     * @param \ABC\IsystemBundle\Entity\AbcAddresses $adresses
     * @return AbcMembersAddresses
     */
    public function setAdresses(\ABC\IsystemBundle\Entity\AbcAddresses $adresses)
    {
        $this->adresses = $adresses;
    
        return $this;
    }

    /**
     * Get adresses
     *
     * @return \ABC\IsystemBundle\Entity\AbcAddresses 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}