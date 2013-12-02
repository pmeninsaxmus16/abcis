<?php

namespace ABC\IsystemBundle\Entity;

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
     *   @ORM\JoinColumn(name="member", referencedColumnName="id")
     * })
     */
    private $member;

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
     * @ORM\ManyToOne(targetEntity="AbcSystems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="system", referencedColumnName="id")
     * })
     */
    private $system;



    /**
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcUserRole
     */
    public function setMember(\ABC\IsystemBundle\Entity\AbcMembers $member)
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
     * Set role
     *
     * @param \ABC\IsystemBundle\Entity\AbcRoles $role
     * @return AbcUserRole
     */
    public function setRole(\ABC\IsystemBundle\Entity\AbcRoles $role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \ABC\IsystemBundle\Entity\AbcRoles 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set system
     *
     * @param \ABC\IsystemBundle\Entity\AbcSystems $system
     * @return AbcUserRole
     */
    public function setSystem(\ABC\IsystemBundle\Entity\AbcSystems $system = null)
    {
        $this->system = $system;
    
        return $this;
    }

    /**
     * Get system
     *
     * @return \ABC\IsystemBundle\Entity\AbcSystems 
     */
    public function getSystem()
    {
        return $this->system;
    }
}