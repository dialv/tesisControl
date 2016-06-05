<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accion
 *
 * @ORM\Table(name="accion", uniqueConstraints={@ORM\UniqueConstraint(name="accion_pk", columns={"id_accion"})})
 * @ORM\Entity
 */
class Accion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_accion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="accion_id_accion_seq", allocationSize=1, initialValue=1)
     */
    private $idAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_ac", type="string", length=50, nullable=true)
     */
    private $descripcionAc;



    /**
     * Get idAccion
     *
     * @return integer 
     */
    public function getIdAccion()
    {
        return $this->idAccion;
    }

    /**
     * Set descripcionAc
     *
     * @param string $descripcionAc
     * @return Accion
     */
    public function setDescripcionAc($descripcionAc)
    {
        $this->descripcionAc = $descripcionAc;

        return $this;
    }

    /**
     * Get descripcionAc
     *
     * @return string 
     */
    public function getDescripcionAc()
    {
        return $this->descripcionAc;
    }
}
