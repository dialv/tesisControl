<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrupoTesis
 *
 * @ORM\Table(name="grupo_tesis", uniqueConstraints={@ORM\UniqueConstraint(name="grupo_tesis_pk", columns={"id_grupo"})}, indexes={@ORM\Index(name="asesora_fk", columns={"id_docente"}), @ORM\Index(name="elabora2_fk", columns={"id_tesis"}), @ORM\Index(name="evalua1_fk", columns={"id_tribun"})})
 * @ORM\Entity
 */
class GrupoTesis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_grupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="grupo_tesis_id_grupo_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
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
     * @var \Tesis
     *
     * @ORM\ManyToOne(targetEntity="Tesis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tesis", referencedColumnName="id_tesis")
     * })
     */
    private $idTesis;

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
     * Set idDocente
     *
     * @param \tesisControl\tesisBundle\Entity\Docente $idDocente
     * @return GrupoTesis
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
     * Set idTesis
     *
     * @param \tesisControl\tesisBundle\Entity\Tesis $idTesis
     * @return GrupoTesis
     */
    public function setIdTesis(\tesisControl\tesisBundle\Entity\Tesis $idTesis = null)
    {
        $this->idTesis = $idTesis;

        return $this;
    }

    /**
     * Get idTesis
     *
     * @return \tesisControl\tesisBundle\Entity\Tesis 
     */
    public function getIdTesis()
    {
        return $this->idTesis;
    }

    /**
     * Set idTribun
     *
     * @param \tesisControl\tesisBundle\Entity\Tribunal $idTribun
     * @return GrupoTesis
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
     
}
