<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcUserRole
 *
 * @ORM\Table(name="abc_user_role")
 * @ORM\Entity
 */
class AbcUserRole
{
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
     * @var \AbcRoles
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role", referencedColumnName="id")
     * })
     */
    private $role;

    /**
     * @var \AbcSystems
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AbcSystems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="system", referencedColumnName="id")
     * })
     */
    private $system;



    /**
     * Set idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     * @return AbcUserRole
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
     * Set role
     *
     * @param \ABC\BookingBundle\Entity\AbcRoles $role
     * @return AbcUserRole
     */
    public function setRole(\ABC\BookingBundle\Entity\AbcRoles $role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \ABC\BookingBundle\Entity\AbcRoles 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set system
     *
     * @param \ABC\BookingBundle\Entity\AbcSystems $system
     * @return AbcUserRole
     */
    public function setSystem(\ABC\BookingBundle\Entity\AbcSystems $system)
    {
        $this->system = $system;
    
        return $this;
    }

    /**
     * Get system
     *
     * @return \ABC\BookingBundle\Entity\AbcSystems 
     */
    public function getSystem()
    {
        return $this->system;
    }
}