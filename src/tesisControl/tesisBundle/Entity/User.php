<?php
namespace tesisControl\tesisBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="admin_user")
*/
class User implements UserInterface
{
/**
* @var integer
*
* @ORM\Column(name="id", type="integer", nullable=false)
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
*/
private $id;

/**
* @var string
*
* @ORM\Column(name="username", type="string", length=255, nullable=true)
*/
protected $username;

/**
* @var string
*
* @ORM\Column(name="password", type="string", length=255, nullable=true)
*/
protected $password;

/**
* @var string
*
* @ORM\Column(name="salt", type="string", length=255, nullable=true)
*/
protected $salt;

/**
* se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
* @ORM\ManyToMany(targetEntity="Role")
* @ORM\JoinTable(name="user_role",
* joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
* inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
* )
*/
protected $user_roles;

public function __construct()
{
$this->user_roles = new ArrayCollection();
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
* Set username
*
* @param string $username
*/
public function setUsername($username)
{
$this->username = $username;
}

/**
* Get username
*
* @return string
*/
public function getUsername()
{
return $this->username;
}

/**
* Set password
*
* @param string $password
*/
public function setPassword($password)
{
$this->password = $password;
}

/**
* Get password
*
* @return string
*/
public function getPassword()
{
return $this->password;
}

/**
* Set salt
*
* @param string $salt
*/
public function setSalt($salt)
{
$this->salt = $salt;
}

/**
* Get salt
*
* @return string
*/
public function getSalt()
{
return $this->salt;
}

/**
* Add user_roles
*
* @param Test\LoginBundle\Entity\Role $userRoles
*/
public function addRole(\Test\LoginBundle\Entity\Role $userRoles)
{
$this->user_roles[] = $userRoles;
}

public function setUserRoles($roles) {
$this->user_roles = $roles;
}

/**
* Get user_roles
*
* @return Doctrine\Common\Collections\Collection
*/
public function getUserRoles()
{
return $this->user_roles;
}

/**
* Get roles
*
* @return Doctrine\Common\Collections\Collection
*/
public function getRoles()
{
//return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
$roles = array();
foreach ($this->user_roles as $role) {
$roles[] = $role->getRole();
}

return $roles;
}

/**
* Compares this user to another to determine if they are the same.
*
* @param UserInterface $user The user
* @return boolean True if equal, false othwerwise.
*/
public function equals(UserInterface $user) {
return md5($this->getUsername()) == md5($user->getUsername());

}

/**
* Erases the user credentials.
*/
public function eraseCredentials() {

}
}