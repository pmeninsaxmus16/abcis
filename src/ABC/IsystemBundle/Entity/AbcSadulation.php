<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcSadulation
 *
 * @ORM\Table(name="abc_sadulation")
 * @ORM\Entity
 */
class AbcSadulation
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
     * @ORM\Column(name="abbreviation_en", type="string", length=10, nullable=true)
     */
    private $abbreviationEn;

    /**
     * @var string
     *
     * @ORM\Column(name="abbreviation_es", type="string", length=10, nullable=false)
     */
    private $abbreviationEs;

    /**
     * @var string
     *
     * @ORM\Column(name="saludation_en", type="string", length=45, nullable=true)
     */
    private $saludationEn;

    /**
     * @var string
     *
     * @ORM\Column(name="saludation_es", type="string", length=45, nullable=false)
     */
    private $saludationEs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;



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
     * Set abbreviationEn
     *
     * @param string $abbreviationEn
     * @return AbcSadulation
     */
    public function setAbbreviationEn($abbreviationEn)
    {
        $this->abbreviationEn = $abbreviationEn;
    
        return $this;
    }

    /**
     * Get abbreviationEn
     *
     * @return string 
     */
    public function getAbbreviationEn()
    {
        return $this->abbreviationEn;
    }

    /**
     * Set abbreviationEs
     *
     * @param string $abbreviationEs
     * @return AbcSadulation
     */
    public function setAbbreviationEs($abbreviationEs)
    {
        $this->abbreviationEs = $abbreviationEs;
    
        return $this;
    }

    /**
     * Get abbreviationEs
     *
     * @return string 
     */
    public function getAbbreviationEs()
    {
        return $this->abbreviationEs;
    }

    /**
     * Set saludationEn
     *
     * @param string $saludationEn
     * @return AbcSadulation
     */
    public function setSaludationEn($saludationEn)
    {
        $this->saludationEn = $saludationEn;
    
        return $this;
    }

    /**
     * Get saludationEn
     *
     * @return string 
     */
    public function getSaludationEn()
    {
        return $this->saludationEn;
    }

    /**
     * Set saludationEs
     *
     * @param string $saludationEs
     * @return AbcSadulation
     */
    public function setSaludationEs($saludationEs)
    {
        $this->saludationEs = $saludationEs;
    
        return $this;
    }

    /**
     * Get saludationEs
     *
     * @return string 
     */
    public function getSaludationEs()
    {
        return $this->saludationEs;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcSadulation
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
}