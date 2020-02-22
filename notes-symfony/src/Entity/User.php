<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Note;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string")
   *
   */
  private $name;
  /**
   * @ORM\Column(type="string")
   */
  private $surname;

  /**
   * @ORM\Column(type="string")
   */
  private $password;
  /**
   * @ORM\Column(type="string")
   */
  private $email;
    /**
   * @ORM\Column(type="string")
   */
  private $username;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param mixed $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param mixed $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return mixed
   */
  public function getSurname()
  {
    return $this->surname;
  }
  /**
   * @param mixed $surname
   */
  public function setSurname($surname)
  {
    $this->surname = $surname;
  }
  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param mixed $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return mixed
   */
  public function getUsername()
  {
    return $this->username;
  }
  /**
   * @param mixed $username
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return mixed
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param mixed $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

}