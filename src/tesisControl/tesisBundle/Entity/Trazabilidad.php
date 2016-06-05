<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trazabilidad
 *
 * @ORM\Table(name="trazabilidad", uniqueConstraints={@ORM\UniqueConstraint(name="trazabilidad_pk", columns={"id_trazabilidad"})}, indexes={@ORM\Index(name="contiene1_fk", columns={"id_tesis"}), @ORM\Index(name="contiene_fk", columns={"id_evento"}), @ORM\Index(name="registra1_fk", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Trazabilidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_trazabilidad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="trazabilidad_id_trazabilidad_seq", allocationSize=1, initialValue=1)
     */
    private $idTrazabilidad;

    /**
     * @var \EventoExt
     *
     * @ORM\ManyToOne(targetEntity="EventoExt")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evento", referencedColumnName="id_evento")
     * })
     */
    private $idEvento;

    /**
     * @var \Tesis
     *
     * @ORM\ManyToOne(targetEntity="Tesis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tesis", referencedColumnName="id_tesis")
     * })
     */
    private $idTesis;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;



    /**
     * Get idTrazabilidad
     *
     * @return integer 
     */
    public function getIdTrazabilidad()
    {
        return $this->idTrazabilidad;
    }

    /**
     * Set idEvento
     *
     * @param \tesisControl\tesisBundle\Entity\EventoExt $idEvento
     * @return Trazabilidad
     */
    public function setIdEvento(\tesisControl\tesisBundle\Entity\EventoExt $idEvento = null)
    {
        $this->idEvento = $idEvento;

        return $this;
    }

    /**
     * Get idEvento
     *
     * @return \tesisControl\tesisBundle\Entity\EventoExt 
     */
    public function getIdEvento()
    {
        return $this->idEvento;
    }

    /**
     * Set idTesis
     *
     * @param \tesisControl\tesisBundle\Entity\Tesis $idTesis
     * @return Trazabilidad
     */
    public function setIdTesis(\tesisControl\tesisBundle\Entity\Tesis $idTesis = null)
    {
        $this->idTesis = $idTesis;

        return $this;
    }

    /**
     * Get idTesis
     *
     * @return \tesisControl\tesisBundle\Entity\Tesis 
     */
    public function getIdTesis()
    {
        return $this->idTesis;
    }

    /**
     * Set idUsuario
     *
     * @param \tesisControl\tesisBundle\Entity\Usuario $idUsuario
     * @return Trazabilidad
     */
    public function setIdUsuario(\tesisControl\tesisBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \tesisControl\tesisBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
