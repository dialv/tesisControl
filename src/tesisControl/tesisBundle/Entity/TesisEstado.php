<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TesisEstado
 *
 * @ORM\Table(name="tesis_estado", uniqueConstraints={@ORM\UniqueConstraint(name="tesis_estado_pk", columns={"id_estado"})}, indexes={@ORM\Index(name="posee1_fk", columns={"id_etapa"}), @ORM\Index(name="posee_fk", columns={"id_grupo"}), @ORM\Index(name="asignada_fk", columns={"id_local"})})
 * @ORM\Entity
 */
class TesisEstado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tesis_estado_id_estado_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_es", type="string", length=50, nullable=true)
     */
    private $nombreEs;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_es", type="string", length=250, nullable=true)
     */
    private $descripcionEs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_defensa", type="date", nullable=true)
     */
    private $fechaDefensa;

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
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=250, nullable=true)
     */
    private $observacion;

    /**
     * @var \Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_local", referencedColumnName="id_local")
     * })
     */
    private $idLocal;

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
     * @var \Etapa
     *
     * @ORM\ManyToOne(targetEntity="Etapa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etapa", referencedColumnName="id_etapa")
     * })
     */
    private $idEtapa;



    /**
     * Get idEstado
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreEs
     *
     * @param string $nombreEs
     * @return TesisEstado
     */
    public function setNombreEs($nombreEs)
    {
        $this->nombreEs = $nombreEs;

        return $this;
    }

    /**
     * Get nombreEs
     *
     * @return string 
     */
    public function getNombreEs()
    {
        return $this->nombreEs;
    }

    /**
     * Set descripcionEs
     *
     * @param string $descripcionEs
     * @return TesisEstado
     */
    public function setDescripcionEs($descripcionEs)
    {
        $this->descripcionEs = $descripcionEs;

        return $this;
    }

    /**
     * Get descripcionEs
     *
     * @return string 
     */
    public function getDescripcionEs()
    {
        return $this->descripcionEs;
    }

    /**
     * Set fechaDefensa
     *
     * @param \DateTime $fechaDefensa
     * @return TesisEstado
     */
    public function setFechaDefensa($fechaDefensa)
    {
        $this->fechaDefensa = $fechaDefensa;

        return $this;
    }

    /**
     * Get fechaDefensa
     *
     * @return \DateTime 
     */
    public function getFechaDefensa()
    {
        return $this->fechaDefensa;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return TesisEstado
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
     * @return TesisEstado
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
     * Set status
     *
     * @param boolean $status
     * @return TesisEstado
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return TesisEstado
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set idLocal
     *
     * @param \tesisControl\tesisBundle\Entity\Local $idLocal
     * @return TesisEstado
     */
    public function setIdLocal(\tesisControl\tesisBundle\Entity\Local $idLocal = null)
    {
        $this->idLocal = $idLocal;

        return $this;
    }

    /**
     * Get idLocal
     *
     * @return \tesisControl\tesisBundle\Entity\Local 
     */
    public function getIdLocal()
    {
        return $this->idLocal;
    }

    /**
     * Set idGrupo
     *
     * @param \tesisControl\tesisBundle\Entity\GrupoTesis $idGrupo
     * @return TesisEstado
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

    /**
     * Set idEtapa
     *
     * @param \tesisControl\tesisBundle\Entity\Etapa $idEtapa
     * @return TesisEstado
     */
    public function setIdEtapa(\tesisControl\tesisBundle\Entity\Etapa $idEtapa = null)
    {
        $this->idEtapa = $idEtapa;

        return $this;
    }

    /**
     * Get idEtapa
     *
     * @return \tesisControl\tesisBundle\Entity\Etapa 
     */
    public function getIdEtapa()
    {
        return $this->idEtapa;
    }
}
