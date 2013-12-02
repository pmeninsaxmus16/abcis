<?php

namespace ABC\admissionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionsBundle\Entity\Pictures
 *
 * @ORM\Table(name="pictures")
 * @ORM\Entity
 */
class Pictures
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
     * @var integer $photo
     *
     * @ORM\Column(name="photo", type="integer", nullable=false)
     */
    private $photo;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=15, nullable=false)
     */
    private $type;

    /**
     * @var float $weight
     *
     * @ORM\Column(name="weight", type="float", nullable=false)
     */
    private $weight;

    /**
     * @var string $size
     *
     * @ORM\Column(name="size", type="string", length=20, nullable=false)
     */
    private $size;

    /**
     * @var string $ext
     *
     * @ORM\Column(name="ext", type="string", length=3, nullable=false)
     */
    private $ext;

    /**
     * @var string $ip
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=false)
     */
    private $ip;

    /**
     * @var string $photoName
     *
     * @ORM\Column(name="photo_name", type="string", length=45, nullable=false)
     */
    private $photoName;

    /**
     * @var string $sessionId
     *
     * @ORM\Column(name="session_id", type="string", length=45, nullable=false)
     */
    private $sessionId;



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
     * Set photo
     *
     * @param integer $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * Set weight
     *
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
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
     * Set size
     *
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
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
     * Set ext
     *
     * @param string $ext
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
    }

    /**
     * Get ext
     *
     * @return string 
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * Set ip
     *
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
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
     * Set photoName
     *
     * @param string $photoName
     */
    public function setPhotoName($photoName)
    {
        $this->photoName = $photoName;
    }

    /**
     * Get photoName
     *
     * @return string 
     */
    public function getPhotoName()
    {
        return $this->photoName;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }
}