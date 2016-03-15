<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 09/03/2016
 * Time: 08:51
 */

namespace stpaul\Domain;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

    private $id;
    private $username;
    private $password;
    private $salt;
    private $role;

    /**
     * User constructor.
     * @param $id
     * @param $username
     * @param $password
     * @param $salt
     * @param $role
     */
    public function __construct($id, $username, $password, $salt, $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->role = $role;
    }


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

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRoles()
    {
        return array($this->getRole());
    }

    public function eraseCredentials()
    {

    }


}