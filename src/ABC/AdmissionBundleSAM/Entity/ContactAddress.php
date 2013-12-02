<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\ContactAddress
 *
 * @ORM\Table(name="contact_address")
 * @ORM\Entity
 */
class ContactAddress
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="id")
     * })
     */
    private $address;

    /**
     * @var Contact
     *
     * @ORM\ManyToOne(targetEntity="Contact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact", referencedColumnName="id")
     * })
     */
    private $contact;



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
     * Set address
     *
     * @param ABC\admissionsBundle\Entity\Addresses $address
     */
    public function setAddress(\ABC\admissionsBundle\Entity\Addresses $address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return ABC\admissionsBundle\Entity\Addresses 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set contact
     *
     * @param ABC\admissionsBundle\Entity\Contact $contact
     */
    public function setContact(\ABC\admissionsBundle\Entity\Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get contact
     *
     * @return ABC\admissionsBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}