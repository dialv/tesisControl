<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acceso
 *
 * @ORM\Table(name="acceso", uniqueConstraints={@ORM\UniqueConstraint(name="acceso_pk", columns={"id_acceso"})}, indexes={@ORM\Index(name="registra_fk", columns={"id_usuario"}), @ORM\Index(name="contiene2_fk", columns={"id_accion"})})
 * @ORM\Entity
 */
class Acceso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_acceso", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="acceso_id_acceso_seq", allocationSize=1, initialValue=1)
     */
    private $idAcceso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var \Accion
     *
     * @ORM\ManyToOne(targetEntity="Accion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_accion", referencedColumnName="id_accion")
     * })
     */
    private $idAccion;

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
     * Get idAcceso
     *
     * @return integer 
     */
    public function getIdAcceso()
    {
        return $this->idAcceso;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Acceso
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set idAccion
     *
     * @param \tesisControl\tesisBundle\Entity\Accion $idAccion
     * @return Acceso
     */
    public function setIdAccion(\tesisControl\tesisBundle\Entity\Accion $idAccion = null)
    {
        $this->idAccion = $idAccion;

        return $this;
    }

    /**
     * Get idAccion
     *
     * @return \tesisControl\tesisBundle\Entity\Accion 
     */
    public function getIdAccion()
    {
        return $this->idAccion;
    }

    /**
     * Set idUsuario
     *
     * @param \tesisControl\tesisBundle\Entity\Usuario $idUsuario
     * @return Acceso
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
