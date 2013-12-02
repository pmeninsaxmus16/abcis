<?php

namespace ABC\BookingBundle\Entity;

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
     * @var string
     *
     * @ORM\Column(name="main_contact", type="string", nullable=false)
     */
    private $mainContact;

    /**
     * @var \AbcMembers
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcMembers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_card", referencedColumnName="id_card")
     * })
     */
    private $idCard;

    /**
     * @var \AbcMembers
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcMembers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact", referencedColumnName="id_card")
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
     * Set idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     * @return AbcMembersContacts
     */
    public function setIdCard(\ABC\BookingBundle\Entity\AbcMembers $idCard)
    {
        $this->idCard = $idCard;
    
        return $this;
    }

    /**
     * Get idCard
     *
     * @return \ABC\BookingBundle\Entity\AbcMembers 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set contact
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $contact
     * @return AbcMembersContacts
     */
    public function setContact(\ABC\BookingBundle\Entity\AbcMembers $contact)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return \ABC\BookingBundle\Entity\AbcMembers 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set relationship
     *
     * @param \ABC\BookingBundle\Entity\AbcRelationship $relationship
     * @return AbcMembersContacts
     */
    public function setRelationship(\ABC\BookingBundle\Entity\AbcRelationship $relationship = null)
    {
        $this->relationship = $relationship;
    
        return $this;
    }

    /**
     * Get relationship
     *
     * @return \ABC\BookingBundle\Entity\AbcRelationship 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }
}