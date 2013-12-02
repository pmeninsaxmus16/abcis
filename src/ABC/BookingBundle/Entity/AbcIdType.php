<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcIdType
 *
 * @ORM\Table(name="abc_id_type")
 * @ORM\Entity
 */
class AbcIdType
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcMembers", inversedBy="idType")
     * @ORM\JoinTable(name="abc_members_personal_id",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_type", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_card", referencedColumnName="id_card")
     *   }
     * )
     */
    private $idCard;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCard = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return AbcIdType
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcIdType
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
     * Add idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     * @return AbcIdType
     */
    public function addIdCard(\ABC\BookingBundle\Entity\AbcMembers $idCard)
    {
        $this->idCard[] = $idCard;
    
        return $this;
    }

    /**
     * Remove idCard
     *
     * @param \ABC\BookingBundle\Entity\AbcMembers $idCard
     */
    public function removeIdCard(\ABC\BookingBundle\Entity\AbcMembers $idCard)
    {
        $this->idCard->removeElement($idCard);
    }

    /**
     * Get idCard
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }
}