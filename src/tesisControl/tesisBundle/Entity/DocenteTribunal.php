<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocenteTribunal
 *
 * @ORM\Table(name="docente_tribunal", uniqueConstraints={@ORM\UniqueConstraint(name="pertenece_pk", columns={"id_doce_tri"})}, indexes={@ORM\Index(name="pertenece2_fk", columns={"id_docente"}), @ORM\Index(name="pertenece_fk", columns={"id_tribun"})})
 * @ORM\Entity
 */
class DocenteTribunal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_doce_tri", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="docente_tribunal_id_doce_tri_seq", allocationSize=1, initialValue=1)
     */
    private $idDoceTri;

    /**
     * @var \Tribunal
     *
     * @ORM\ManyToOne(targetEntity="Tribunal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tribun", referencedColumnName="id_tribun")
     * })
     */
    private $idTribun;

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
     * Get idDoceTri
     *
     * @return integer 
     */
    public function getIdDoceTri()
    {
        return $this->idDoceTri;
    }

    /**
     * Set idTribun
     *
     * @param \tesisControl\tesisBundle\Entity\Tribunal $idTribun
     * @return DocenteTribunal
     */
    public function setIdTribun(\tesisControl\tesisBundle\Entity\Tribunal $idTribun = null)
    {
        $this->idTribun = $idTribun;

        return $this;
    }

    /**
     * Get idTribun
     *
     * @return \tesisControl\tesisBundle\Entity\Tribunal 
     */
    public function getIdTribun()
    {
        return $this->idTribun;
    }

    /**
     * Set idDocente
     *
     * @param \tesisControl\tesisBundle\Entity\Docente $idDocente
     * @return DocenteTribunal
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
