<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\User;
/**
 * @ORM\Entity
 * @ORM\Table(name="notes")
 */
class Note {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=150)
   *
   */
  private $title;
  /**
   * @ORM\Column(type="string", length=1000)
   */
  private $body;

  /**
   * @ORM\Column(type="integer")
   */
  private $user_id;
  /**
   * @ORM\Column(type="string")
   */
  private $type;

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
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param mixed $title
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return mixed
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param mixed $body
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return mixed
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param mixed $type
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return mixed
   */
  public function getUserId()
  {
    return $this->user_id;
  }
  /**
   * @param mixed $user_id
   */
  public function setUserId($user_id)
  {
    $this->user_id = $user_id;
  }

}