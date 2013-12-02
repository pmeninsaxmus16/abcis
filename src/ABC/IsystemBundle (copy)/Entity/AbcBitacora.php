<?php

namespace ABC\IsystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbcBitacora
 *
 * @ORM\Table(name="abc_bitacora")
 * @ORM\Entity
 */
class AbcBitacora
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_card", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCard;

    /**
     * @var string
     *
     * @ORM\Column(name="operacion", type="string", length=10, nullable=true)
     */
    private $operacion;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=10, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=15, nullable=true)
     */
    private $host;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificado", type="datetime", nullable=true)
     */
    private $modificado;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=80, nullable=true)
     */
    private $tabla;



    /**
     * Get idCard
     *
     * @return string 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set operacion
     *
     * @param string $operacion
     * @return AbcBitacora
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;
    
        return $this;
    }

    /**
     * Get operacion
     *
     * @return string 
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return AbcBitacora
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return AbcBitacora
     */
    public function setHost($host)
    {
        $this->host = $host;
    
        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set modificado
     *
     * @param \DateTime $modificado
     * @return AbcBitacora
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    
        return $this;
    }

    /**
     * Get modificado
     *
     * @return \DateTime 
     */
    public function getModificado()
    {
        return $this->modificado;
    }

    /**
     * Set tabla
     *
     * @param string $tabla
     * @return AbcBitacora
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;
    
        return $this;
    }

    /**
     * Get tabla
     *
     * @return string 
     */
    public function getTabla()
    {
        return $this->tabla;
    }
}