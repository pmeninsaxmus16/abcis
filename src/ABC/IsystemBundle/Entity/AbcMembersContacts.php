<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcMembersContacts
 *
 * @ORM\Table(name="abc_members_contacts")
 * @ORM\Entity
 */
class AbcMembersContacts
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
     * @ORM\Column(name="main_contact", type="string", nullable=false)
     */
    private $mainContact;

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
     * @var \AbcMembers
     *
     * @ORM\ManyToOne(targetEntity="AbcMembers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact", referencedColumnName="id")
     * })
     */
    private $contact;

    /**
     * @var \AbcRelationship
     *
     * @ORM\ManyToOne(targetEntity="AbcRelationship")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relationship", referencedColumnName="id")
     * })
     */
    private $relationship;



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
     * Set mainContact
     *
     * @param string $mainContact
     * @return AbcMembersContacts
     */
    public function setMainContact($mainContact)
    {
        $this->mainContact = $mainContact;
    
        return $this;
    }

    /**
     * Get mainContact
     *
     * @return string 
     */
    public function getMainContact()
    {
        return $this->mainContact;
    }

    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcMembersContacts
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
     * Set contact
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $contact
     * @return AbcMembersContacts
     */
    public function setContact(\ABC\IsystemBundle\Entity\AbcMembers $contact = null)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return \ABC\IsystemBundle\Entity\AbcMembers 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set relationship
     *
     * @param \ABC\IsystemBundle\Entity\AbcRelationship $relationship
     * @return AbcMembersContacts
     */
    public function setRelationship(\ABC\IsystemBundle\Entity\AbcRelationship $relationship = null)
    {
        $this->relationship = $relationship;
    
        return $this;
    }

    /**
     * Get relationship
     *
     * @return \ABC\IsystemBundle\Entity\AbcRelationship 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }
}