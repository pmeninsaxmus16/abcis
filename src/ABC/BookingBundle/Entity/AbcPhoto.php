<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcPhoto
 *
 * @ORM\Table(name="abc_photo")
 * @ORM\Entity
 */
class AbcPhoto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="photo", type="integer", nullable=false)
     */
    private $photo;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=false)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=15, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=6, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="photoname", type="string", length=80, nullable=false)
     */
    private $photoname;

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
     * Set photo
     *
     * @param integer $photo
     * @return AbcPhoto
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return integer 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return AbcPhoto
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return AbcPhoto
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return AbcPhoto
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return AbcPhoto
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set photoname
     *
     * @param string $photoname
     * @return AbcPhoto
     */
    public function setPhotoname($photoname)
    {
        $this->photoname = $photoname;
    
        return $this;
    }

    /**
     * Get photoname
     *
     * @return string 
     */
    public function getPhotoname()
    {
        return $this->photoname;
    }

    /**
     * Set idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     * @return AbcPhoto
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
}