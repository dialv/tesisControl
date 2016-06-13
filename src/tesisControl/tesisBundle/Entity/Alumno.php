<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno", uniqueConstraints={@ORM\UniqueConstraint(name="alumno_pk", columns={"carnet_a"})}, indexes={@ORM\Index(name="conforman_fk", columns={"id_grupo"})})
 * @ORM\Entity
 */
class Alumno
{
    /**
     * @var string
     *
     * @ORM\Column(name="carnet_a", type="string", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="alumno_carnet_a_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_a", type="string", length=50, nullable=true)
     */
    private $nombreA;

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
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreA
     *
     * @param string $nombreA
     * @return Alumno
     */
    public function setNombreA($nombreA)
    {
        $this->nombreA = $nombreA;

        return $this;
    }

    /**
     * Get nombreA
     *
     * @return string 
     */
    public function getNombreA()
    {
        return $this->nombreA;
    }

    /**
     * Set idGrupo
     *
     * @param \tesisControl\tesisBundle\Entity\GrupoTesis $idGrupo
     * @return Alumno
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
