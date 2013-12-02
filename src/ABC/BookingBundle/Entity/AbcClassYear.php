<?php

namespace ABC\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcClassYear
 *
 * @ORM\Table(name="abc_class_year")
 * @ORM\Entity
 */
class AbcClassYear
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
     * @ORM\Column(name="class_year", type="string", length=45, nullable=false)
     */
    private $classYear;



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
     * Set classYear
     *
     * @param string $classYear
     * @return AbcClassYear
     */
    public function setClassYear($classYear)
    {
        $this->classYear = $classYear;
    
        return $this;
    }

    /**
     * Get classYear
     *
     * @return string 
     */
    public function getClassYear()
    {
        return $this->classYear;
    }
}