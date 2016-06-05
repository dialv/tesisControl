<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table(name="perfil", uniqueConstraints={@ORM\UniqueConstraint(name="perfil_pk", columns={"id_perfil"})}, indexes={@ORM\Index(name="evalua_fk", columns={"id_tesis"})})
 * @ORM\Entity
 */
class Perfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_perfil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="perfil_id_perfil_seq", allocationSize=1, initialValue=1)
     */
    private $idPerfil;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="string", length=50, nullable=true)
     */
    private $entidad;

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
     * Get idPerfil
     *
     * @return integer 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Perfil
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

    /**
     * Set entidad
     *
     * @param string $entidad
     * @return Perfil
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return string 
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set idTesis
     *
     * @param \tesisControl\tesisBundle\Entity\Tesis $idTesis
     * @return Perfil
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
}
