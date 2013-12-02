<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcGroups
 *
 * @ORM\Table(name="abc_groups")
 * @ORM\Entity
 */
class AbcGroups
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
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=false)
     */
    private $weight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AbcMembers", inversedBy="group")
     * @ORM\JoinTable(name="abc_members_groups",
     *   joinColumns={
     *     @ORM\JoinColumn(name="group", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_card", referencedColumnName="id_card")
     *   }
     * )
     */
    private $idCard;

    /**
     * @var \AbcGroups
     *
     * @ORM\ManyToOne(targetEntity="AbcGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;

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
     * @return AbcGroups
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
     * Set weight
     *
     * @param integer $weight
     * @return AbcGroups
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return AbcGroups
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
     * @return AbcGroups
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

    /**
     * Set group
     *
     * @param \ABC\BookingBundle\Entity\AbcGroups $group
     * @return AbcGroups
     */
    public function setGroup(\ABC\BookingBundle\Entity\AbcGroups $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \ABC\BookingBundle\Entity\AbcGroups 
     */
    public function getGroup()
    {
        return $this->group;
    }
}