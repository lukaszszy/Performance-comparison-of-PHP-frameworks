<?php
namespace App\Entity;
use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="users")
 */
class User {

  /**
  * @Column(type="integer")
  * @Id
  * @GeneratedValue(strategy="AUTO")
  */
 private $id;
 /**
  * @Column(type="string")
  *
  */
 private $name;
 /**
  * @Column(type="string")
  */
 private $surname;

 /**
  * @Column(type="string")
  */
 private $password;
 /**
  * @Column(type="string")
  */
 private $email;
   /**
  * @Column(type="string")
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