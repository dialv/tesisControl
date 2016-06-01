<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ejerce1
 *
 * @ORM\Table(name="ejerce1", uniqueConstraints={@ORM\UniqueConstraint(name="ejerce1_pk", columns={"id_t_docente"})}, indexes={@ORM\Index(name="ejerce2_fk", columns={"id_rol"}), @ORM\Index(name="ejerce1_fk", columns={"id_docente"})})
 * @ORM\Entity
 */
class Ejerce1
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_t_docente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ejerce1_id_t_docente_seq", allocationSize=1, initialValue=1)
     */
    private $idTDocente;

    /**
     * @var \Docente
     *
     * @ORM\ManyToOne(targetEntity="Docente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_docente", referencedColumnName="id_docente")
     * })
     */
    private $idDocente;

    /**
     * @var \Rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id_rol")
     * })
     */
    private $idRol;



    /**
     * Get idTDocente
     *
     * @return integer 
     */
    public function getIdTDocente()
    {
        return $this->idTDocente;
    }

    /**
     * Set idDocente
     *
     * @param \tesisControl\tesisBundle\Entity\Docente $idDocente
     * @return Ejerce1
     */
    public function setIdDocente(\tesisControl\tesisBundle\Entity\Docente $idDocente = null)
    {
        $this->idDocente = $idDocente;

        return $this;
    }

    /**
     * Get idDocente
     *
     * @return \tesisControl\tesisBundle\Entity\Docente 
     */
    public function getIdDocente()
    {
        return $this->idDocente;
    }

    /**
     * Set idRol
     *
     * @param \tesisControl\tesisBundle\Entity\Rol $idRol
     * @return Ejerce1
     */
    public function setIdRol(\tesisControl\tesisBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \tesisControl\tesisBundle\Entity\Rol 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}
