<?php

namespace ABC\AdmissionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SchoolUseSubject
 *
 * @ORM\Table(name="school_use_subject")
 * @ORM\Entity
 */
class SchoolUseSubject
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
     * @ORM\Column(name="subject", type="string", length=45, nullable=false)
     */
    private $subject;



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
     * Set subject
     *
     * @param string $subject
     * @return SchoolUseSubject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }
}