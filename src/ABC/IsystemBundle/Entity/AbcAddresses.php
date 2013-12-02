<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcAddresses
 *
 * @ORM\Table(name="abc_addresses")
 * @ORM\Entity
 */
class AbcAddresses
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
     * @ORM\Column(name="country", type="string", length=80, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=80, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="barrio", type="string", length=80, nullable=false)
     */
    private $barrio;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=200, nullable=false)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \AbcAddressesType
     *
     * @ORM\ManyToOne(targetEntity="AbcAddressesType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="addresses_type", referencedColumnName="id")
     * })
     */
    private $addressesType;

    /**
     * @var \AbcDepartment
     *
     * @ORM\ManyToOne(targetEntity="AbcDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departament", referencedColumnName="id")
     * })
     */
    private $departament;

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
     * Set country
     *
     * @param string $country
     * @return AbcAddresses
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return AbcAddresses
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return AbcAddresses
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;
    
        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return AbcAddresses
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcAddresses
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
     * Set addressesType
     *
     * @param \ABC\IsystemBundle\Entity\AbcAddressesType $addressesType
     * @return AbcAddresses
     */
    public function setAddressesType(\ABC\IsystemBundle\Entity\AbcAddressesType $addressesType = null)
    {
        $this->addressesType = $addressesType;
    
        return $this;
    }

    /**
     * Get addressesType
     *
     * @return \ABC\IsystemBundle\Entity\AbcAddressesType 
     */
    public function getAddressesType()
    {
        return $this->addressesType;
    }

    /**
     * Set departament
     *
     * @param \ABC\IsystemBundle\Entity\AbcDepartment $departament
     * @return AbcAddresses
     */
    public function setDepartament(\ABC\IsystemBundle\Entity\AbcDepartment $departament = null)
    {
        $this->departament = $departament;
    
        return $this;
    }

    /**
     * Get departament
     *
     * @return \ABC\IsystemBundle\Entity\AbcDepartment 
     */
    public function getDepartament()
    {
        return $this->departament;
    }

    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcAddresses
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