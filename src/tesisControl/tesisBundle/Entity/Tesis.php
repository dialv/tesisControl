<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tesis
 *
 * @ORM\Table(name="tesis", uniqueConstraints={@ORM\UniqueConstraint(name="tesis_pk", columns={"id_tesis"})}, indexes={@ORM\Index(name="elabora_fk", columns={"id_grupo"})})
 * @ORM\Entity
 */
class Tesis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tesis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tesis_id_tesis_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_t", type="string", length=50, nullable=true)
     */
    private $nombreT;

    /**
     * @var \GrupoTesis
     *
     * @ORM\ManyToOne(targetEntity="GrupoTesis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_grupo", referencedColumnName="id_grupo")
     * })
     */
    private $idGrupo;
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Tesis
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Tesis
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set nombreT
     *
     * @param string $nombreT
     * @return Tesis
     */
    public function setNombreT($nombreT)
    {
        $this->nombreT = $nombreT;

        return $this;
    }

    /**
     * Get nombreT
     *
     * @return string 
     */
    public function getNombreT()
    {
        return $this->nombreT;
    }

    /**
     * Set idGrupo
     *
     * @param \tesisControl\tesisBundle\Entity\GrupoTesis $idGrupo
     * @return Tesis
     */
    public function setIdGrupo(\tesisControl\tesisBundle\Entity\GrupoTesis $idGrupo = null)
    {
        $this->idGrupo = $idGrupo;

        return $this;
    }

    /**
     * Get idGrupo
     *
     * @return \tesisControl\tesisBundle\Entity\GrupoTesis 
     */
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }
}
