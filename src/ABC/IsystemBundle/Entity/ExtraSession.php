<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraSession
 *
 * @ORM\Table(name="extra_session")
 * @ORM\Entity
 */
class ExtraSession
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
     * @var \DateTime
     *
     * @ORM\Column(name="session_start", type="datetime", nullable=false)
     */
    private $sessionStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="session_end", type="datetime", nullable=false)
     */
    private $sessionEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", nullable=false)
     */
    private $active;

    /**
     * @var \AbcSections
     *
     * @ORM\ManyToOne(targetEntity="AbcSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_section", referencedColumnName="id")
     * })
     */
    private $idSection;



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
     * Set sessionStart
     *
     * @param \DateTime $sessionStart
     * @return ExtraSession
     */
    public function setSessionStart($sessionStart)
    {
        $this->sessionStart = $sessionStart;
    
        return $this;
    }

    /**
     * Get sessionStart
     *
     * @return \DateTime 
     */
    public function getSessionStart()
    {
        return $this->sessionStart;
    }

    /**
     * Set sessionEnd
     *
     * @param \DateTime $sessionEnd
     * @return ExtraSession
     */
    public function setSessionEnd($sessionEnd)
    {
        $this->sessionEnd = $sessionEnd;
    
        return $this;
    }

    /**
     * Get sessionEnd
     *
     * @return \DateTime 
     */
    public function getSessionEnd()
    {
        return $this->sessionEnd;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ExtraSession
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set active
     *
     * @param string $active
     * @return ExtraSession
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set idSection
     *
     * @param \ABC\IsystemBundle\Entity\AbcSections $idSection
     * @return ExtraSession
     */
    public function setIdSection(\ABC\IsystemBundle\Entity\AbcSections $idSection = null)
    {
        $this->idSection = $idSection;
    
        return $this;
    }

    /**
     * Get idSection
     *
     * @return \ABC\IsystemBundle\Entity\AbcSections 
     */
    public function getIdSection()
    {
        return $this->idSection;
    }
}