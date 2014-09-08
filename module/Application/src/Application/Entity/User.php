<?php
/**
 * Created by PhpStorm.
 * User: matveev
 * Date: 9/8/14
 * Time: 4:27 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\Users")
 * @ORM\Table(name="users")
 */
class User {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="full_name")
     */
    protected $fullName;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $blocked = 0;

    /**
     * @param int $blocked
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;
    }

    /**
     * @return int
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
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
    public function getId()
    {
        return $this->id;
    }

}