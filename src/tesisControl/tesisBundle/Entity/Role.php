<?php
namespace tesisControl\tesisBundle\Entity;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="admin_roles")
*/
class Role implements RoleInterface
{
/**
* @var integer
*
* @ORM\Column(name="id", type="integer", nullable=false)
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*/
protected $id;

/**
* @var string
*
* @ORM\Column(name="nombre", type="string", length=255, nullable=true)
*/
protected $name;

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
* Set name
*
* @param string $name
*/
public function setName($name)
{
$this->name = $name;
}

/**
* Get name
*
* @return string
*/
public function getName()
{
return $this->name;
}

public function getRole() {
return $this->getName();
}

public function __toString() {
return $this->getRole();
}
}