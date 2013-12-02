<?php

namespace ABC\AdmissionBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\AdmissionBundle\Entity\Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity
 */
class Roles implements RoleInterface
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
     * @var integer $level
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var string $rol
     *
     * @ORM\Column(name="rol", type="string", length=45, nullable=true)
     */
    private $rol;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var Users
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="role")
     */
    private $session;

    public function __construct()
    {
        $this->session = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set level
     *
     * @param integer $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set rol
     *
     * @param string $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->rol;
    }
    public function __toString()
    {
        return $this->getRole();
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

}
