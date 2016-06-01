<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tribunal
 *
 * @ORM\Table(name="tribunal", uniqueConstraints={@ORM\UniqueConstraint(name="tribunal_pk", columns={"id_tribun"})}, indexes={@ORM\Index(name="evalua2_fk", columns={"id_grupo"})})
 * @ORM\Entity
 */
class Tribunal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tribun", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tribunal_id_tribun_seq", allocationSize=1, initialValue=1)
     */
    private $idTribun;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=250, nullable=true)
     */
    private $observacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $nota;

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
     * Get idTribun
     *
     * @return integer 
     */
    public function getIdTribun()
    {
        return $this->idTribun;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Tribunal
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
     * Set nota
     *
     * @param string $nota
     * @return Tribunal
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
     * Set idGrupo
     *
     * @param \tesisControl\tesisBundle\Entity\GrupoTesis $idGrupo
     * @return Tribunal
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
