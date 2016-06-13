<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notas
 *
 * @ORM\Table(name="notas", uniqueConstraints={@ORM\UniqueConstraint(name="notas_pk", columns={"id_nota"})}, indexes={@ORM\Index(name="registra2_fk", columns={"id_etapa"}), @ORM\Index(name="obtiene_fk", columns={"carnet_a"})})
 * @ORM\Entity
 */
class Notas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_nota", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="notas_id_nota_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $nota;

    /**
     * @var string
     *
     * @ORM\Column(name="ponderacion", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $ponderacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=250, nullable=true)
     */
    private $observacion;

    /**
     * @var \Alumno
     *
     * @ORM\ManyToOne(targetEntity="Alumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carnet_a", referencedColumnName="carnet_a")
     * })
     */
    private $carnetA;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return Notas
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set ponderacion
     *
     * @param string $ponderacion
     * @return Notas
     */
    public function setPonderacion($ponderacion)
    {
        $this->ponderacion = $ponderacion;

        return $this;
    }

    /**
     * Get ponderacion
     *
     * @return string 
     */
    public function getPonderacion()
    {
        return $this->ponderacion;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Notas
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
     * Set carnetA
     *
     * @param \tesisControl\tesisBundle\Entity\Alumno $carnetA
     * @return Notas
     */
    public function setCarnetA(\tesisControl\tesisBundle\Entity\Alumno $carnetA = null)
    {
        $this->carnetA = $carnetA;

        return $this;
    }

    /**
     * Get carnetA
     *
     * @return \tesisControl\tesisBundle\Entity\Alumno 
     */
    public function getCarnetA()
    {
        return $this->carnetA;
    }

    /**
     * Set idEtapa
     *
     * @param \tesisControl\tesisBundle\Entity\Etapa $idEtapa
     * @return Notas
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
