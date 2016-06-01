<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docente
 *
 * @ORM\Table(name="docente", uniqueConstraints={@ORM\UniqueConstraint(name="docente_pk", columns={"id_docente"})}, indexes={@ORM\Index(name="registra4_fk", columns={"id_usuario"}), @ORM\Index(name="trabaja_fk", columns={"id_departamento"})})
 * @ORM\Entity
 */
class Docente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_docente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="docente_id_docente_seq", allocationSize=1, initialValue=1)
     */
    private $idDocente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_d", type="string", length=50, nullable=true)
     */
    private $nombreD;

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
     * @var \Departamento
     *
     * @ORM\ManyToOne(targetEntity="Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_departamento", referencedColumnName="id_departamento")
     * })
     */
    private $idDepartamento;



    /**
     * Get idDocente
     *
     * @return integer 
     */
    public function getIdDocente()
    {
        return $this->idDocente;
    }

    /**
     * Set nombreD
     *
     * @param string $nombreD
     * @return Docente
     */
    public function setNombreD($nombreD)
    {
        $this->nombreD = $nombreD;

        return $this;
    }

    /**
     * Get nombreD
     *
     * @return string 
     */
    public function getNombreD()
    {
        return $this->nombreD;
    }

    /**
     * Set idUsuario
     *
     * @param \tesisControl\tesisBundle\Entity\Usuario $idUsuario
     * @return Docente
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

    /**
     * Set idDepartamento
     *
     * @param \tesisControl\tesisBundle\Entity\Departamento $idDepartamento
     * @return Docente
     */
    public function setIdDepartamento(\tesisControl\tesisBundle\Entity\Departamento $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \tesisControl\tesisBundle\Entity\Departamento 
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }
}
