<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table(name="rol", uniqueConstraints={@ORM\UniqueConstraint(name="rol_pk", columns={"id_rol"})})
 * @ORM\Entity
 */
class Rol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rol_id_rol_seq", allocationSize=1, initialValue=1)
     */
    private $idRol;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_r", type="string", length=50, nullable=true)
     */
    private $nombreR;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_r", type="string", length=250, nullable=true)
     */
    private $descripcionR;



    /**
     * Get idRol
     *
     * @return integer 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set nombreR
     *
     * @param string $nombreR
     * @return Rol
     */
    public function setNombreR($nombreR)
    {
        $this->nombreR = $nombreR;

        return $this;
    }

    /**
     * Get nombreR
     *
     * @return string 
     */
    public function getNombreR()
    {
        return $this->nombreR;
    }

    /**
     * Set descripcionR
     *
     * @param string $descripcionR
     * @return Rol
     */
    public function setDescripcionR($descripcionR)
    {
        $this->descripcionR = $descripcionR;

        return $this;
    }

    /**
     * Get descripcionR
     *
     * @return string 
     */
    public function getDescripcionR()
    {
        return $this->descripcionR;
    }
}
