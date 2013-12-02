<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * AbcPhoto
 *
 * @ORM\Table(name="abc_photo")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class AbcPhoto
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
     * @var string $photo
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="photo", type="blob", nullable=false)
     */
    private $photo;
    
    
    /**
     * @var string $photo
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     */
    private $img;

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
     * Set photo
     *
     * @param string $photo
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
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    /**
     * Set img
     *
     * @param string $img
     * @return AbcPhoto
     */
    public function setImg($img)
    {
        $this->img = $img;
    
        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
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
     * Set member
     *
     * @param \ABC\IsystemBundle\Entity\AbcMembers $member
     * @return AbcPhoto
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
    
   public function getFullImagePath() {
        return null === $this->img ? null : $this->getUploadRootDir(). $this->img;
    }
 
    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return $this->getTmpUploadRootDir().$this->getId()."/";
    }
 
    protected function getTmpUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/';
    }
 
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function uploadImage() {
        // the file property can be empty if the field is not required
        if (null === $this->img) {
            return;
        }
        if(!$this->id){
            $this->img->move($this->getTmpUploadRootDir(), $this->img->getClientOriginalName());
        }else{
            $this->img->move($this->getUploadRootDir(), $this->img->getClientOriginalName());
        }
        
        $this->setWeight($this->img->getMaxFilesize());
        $stream = fopen($this->getTmpUploadRootDir().$this->img->getClientOriginalName(),'rb');
        $this->setPhoto(stream_get_contents($stream));
        $this->setImg($this->img->getClientOriginalName());
        //$datos = fread ($stream, filesize ($this->getTmpUploadRootDir().$this->img->getClientOriginalName()));
        //$this->setPhoto(base64_encode(stream_get_contents($datos)));      
    }
 
    /**
     * @ORM\PostPersist()
     */
    public function moveImage()
    {
        if (null === $this->img) {
            return;
        }
        if(!is_dir($this->getUploadRootDir())){
            //mkdir($this->getUploadRootDir());
            //chmod($this->getUploadRootDir(), 0775);
        }
        //copy($this->getTmpUploadRootDir().$this->img, $this->getFullImagePath());
        //chmod($this->getFullImagePath(), 0775);
        //unlink($this->getTmpUploadRootDir().$this->img);
        
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeImage()
    {
        unlink($this->getFullImagePath());
        rmdir($this->getUploadRootDir());
    }   
    
    
     public function setImage()
    {
        if (null === $this->img) {
            return;
        }
        if(!is_dir($this->getUploadRootDir())){
            mkdir($this->getUploadRootDir());
            //chmod($this->getUploadRootDir(), 0775);
        }
        copy($this->getTmpUploadRootDir().$this->img->getClientOriginalName(), $this->getFullImagePath());
        chmod($this->getFullImagePath(), 0775);
        //unlink($this->getTmpUploadRootDir().$this->img);
        
    }
    
    
     public function uploadPhoto() {
        // the file property can be empty if the field is not required
        if (null === $this->img) {
            return;
        }
       
        if(!$this->member->getIdCard()){
            $this->img->move($this->getTmpUploadRootDir(), $this->img->getClientOriginalName());
        }else{
            $this->img->move($this->getTmpUploadRootDir(), $this->img->getClientOriginalName());
        }      
         rename($this->getTmpUploadRootDir().$this->img->getClientOriginalName(),$this->getTmpUploadRootDir().$this->member->getIdCard());
         chmod($this->getTmpUploadRootDir().$this->member->getIdCard(), 1775);
        
    }
  
}