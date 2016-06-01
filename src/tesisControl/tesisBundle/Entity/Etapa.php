<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etapa
 *
 * @ORM\Table(name="etapa", uniqueConstraints={@ORM\UniqueConstraint(name="etapa_pk", columns={"id_etapa"})})
 * @ORM\Entity
 */
class Etapa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_etapa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="etapa_id_etapa_seq", allocationSize=1, initialValue=1)
     */
    private $idEtapa;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentaje", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $porcentaje;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;



    /**
     * Get idEtapa
     *
     * @return integer 
     */
    public function getIdEtapa()
    {
        return $this->idEtapa;
    }

    /**
     * Set porcentaje
     *
     * @param string $porcentaje
     * @return Etapa
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return string 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Etapa
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
