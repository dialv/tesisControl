<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="usuario_pk", columns={"id_usuario"})}, indexes={@ORM\Index(name="registra3_fk", columns={"id_docente"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_usuario", type="string", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", nullable=true)
     */
    private $clave;

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
     * Set idUsuario
     *
     * @param string $id
     * @return Usuario
     */
    public function setId($id)
    {
        $this->id= $id;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Usuario
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set idDocente
     *
     * @param \tesisControl\tesisBundle\Entity\Docente $idDocente
     * @return Usuario
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
}
