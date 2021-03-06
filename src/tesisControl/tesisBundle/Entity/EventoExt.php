<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventoExt
 *
 * @ORM\Table(name="evento_ext", uniqueConstraints={@ORM\UniqueConstraint(name="evento_ext_pk", columns={"id_evento"})})
 * @ORM\Entity
 */
class EventoExt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_evento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="evento_ext_id_evento_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;

    /**
    * String representation of this object
    * @return string
    */
    public function __toString()
    {
        try {
            return (string) $this->id;
        } catch (Exception $exception) {
            return '';
            }
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return EventoExt
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return EventoExt
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
