<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento", uniqueConstraints={@ORM\UniqueConstraint(name="departamento_pk", columns={"id_departamento"})}, indexes={@ORM\Index(name="pertenece1_fk", columns={"id_carrera"})})
 * @ORM\Entity
 */
class Departamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_departamento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="departamento_id_departamento_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_dp", type="string", length=50, nullable=true)
     */
    private $nombreDp;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_carrera", referencedColumnName="id_carrera")
     * })
     */
    private $idCarrera;



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
     * Set nombreDp
     *
     * @param string $nombreDp
     * @return Departamento
     */
    public function setNombreDp($nombreDp)
    {
        $this->nombreDp = $nombreDp;

        return $this;
    }

    /**
     * Get nombreDp
     *
     * @return string 
     */
    public function getNombreDp()
    {
        return $this->nombreDp;
    }

    /**
     * Set idCarrera
     *
     * @param \tesisControl\tesisBundle\Entity\Carrera $idCarrera
     * @return Departamento
     */
    public function setIdCarrera(\tesisControl\tesisBundle\Entity\Carrera $idCarrera = null)
    {
        $this->idCarrera = $idCarrera;

        return $this;
    }

    /**
     * Get idCarrera
     *
     * @return \tesisControl\tesisBundle\Entity\Carrera 
     */
    public function getIdCarrera()
    {
        return $this->idCarrera;
    }
}
