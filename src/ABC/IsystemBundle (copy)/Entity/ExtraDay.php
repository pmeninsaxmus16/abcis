<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraDay
 *
 * @ORM\Table(name="extra_day")
 * @ORM\Entity
 */
class ExtraDay
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
     * @ORM\Column(name="day_es", type="string", length=10, nullable=false)
     */
    private $dayEs;

    /**
     * @var string
     *
     * @ORM\Column(name="day_en", type="string", length=10, nullable=false)
     */
    private $dayEn;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ExtraCourseSubsession", inversedBy="idDay")
     * @ORM\JoinTable(name="extra_course_subsession_day",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_day", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_course_subsession", referencedColumnName="id")
     *   }
     * )
     */
    private $idCourseSubsession;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCourseSubsession = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dayEs
     *
     * @param string $dayEs
     * @return ExtraDay
     */
    public function setDayEs($dayEs)
    {
        $this->dayEs = $dayEs;
    
        return $this;
    }

    /**
     * Get dayEs
     *
     * @return string 
     */
    public function getDayEs()
    {
        return $this->dayEs;
    }

    /**
     * Set dayEn
     *
     * @param string $dayEn
     * @return ExtraDay
     */
    public function setDayEn($dayEn)
    {
        $this->dayEn = $dayEn;
    
        return $this;
    }

    /**
     * Get dayEn
     *
     * @return string 
     */
    public function getDayEn()
    {
        return $this->dayEn;
    }

    /**
     * Add idCourseSubsession
     *
     * @param \ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession
     * @return ExtraDay
     */
    public function addIdCourseSubsession(\ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession)
    {
        $this->idCourseSubsession[] = $idCourseSubsession;
    
        return $this;
    }

    /**
     * Remove idCourseSubsession
     *
     * @param \ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession
     */
    public function removeIdCourseSubsession(\ABC\IsystemBundle\Entity\ExtraCourseSubsession $idCourseSubsession)
    {
        $this->idCourseSubsession->removeElement($idCourseSubsession);
    }

    /**
     * Get idCourseSubsession
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdCourseSubsession()
    {
        return $this->idCourseSubsession;
    }
}