<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraSubsession
 *
 * @ORM\Table(name="extra_subsession")
 * @ORM\Entity
 */
class ExtraSubsession
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
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=false)
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_enroll", type="integer", nullable=false)
     */
    private $maxEnroll;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \ExtraSession
     *
     * @ORM\ManyToOne(targetEntity="ExtraSession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_session", referencedColumnName="id")
     * })
     */
    private $idSession;



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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return ExtraSubsession
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return ExtraSubsession
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set maxEnroll
     *
     * @param integer $maxEnroll
     * @return ExtraSubsession
     */
    public function setMaxEnroll($maxEnroll)
    {
        $this->maxEnroll = $maxEnroll;
    
        return $this;
    }

    /**
     * Get maxEnroll
     *
     * @return integer 
     */
    public function getMaxEnroll()
    {
        return $this->maxEnroll;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ExtraSubsession
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
     * Set idSession
     *
     * @param \ABC\BookingBundle\Entity\ExtraSession $idSession
     * @return ExtraSubsession
     */
    public function setIdSession(\ABC\BookingBundle\Entity\ExtraSession $idSession = null)
    {
        $this->idSession = $idSession;
    
        return $this;
    }

    /**
     * Get idSession
     *
     * @return \ABC\BookingBundle\Entity\ExtraSession 
     */
    public function getIdSession()
    {
        return $this->idSession;
    }
}