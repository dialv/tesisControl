<?php

namespace tesisControl\tesisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrera
 *
 * @ORM\Table(name="carrera_", uniqueConstraints={@ORM\UniqueConstraint(name="carrera__pk", columns={"id_carrera"})})
 * @ORM\Entity
 */
class Carrera
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_carrera", type="string", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="carrera__id_carrera_seq", allocationSize=1, initialValue=1)
     */
    private $idCarrera;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_c", type="string", nullable=true)
     */
    private $nombreC;



    /**
     * Get idCarrera
     *
     * @return string 
     */
    public function getIdCarrera()
    {
        return $this->idCarrera;
    }

    /**
     * Set nombreC
     *
     * @param string $nombreC
     * @return Carrera
     */
    public function setNombreC($nombreC)
    {
        $this->nombreC = $nombreC;

        return $this;
    }

    /**
     * Get nombreC
     *
     * @return string 
     */
    public function getNombreC()
    {
        return $this->nombreC;
    }
}
