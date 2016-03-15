<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 09/03/2016
 * Time: 08:57
 */

namespace stpaul\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\DBAL\Connection;
use stpaul\Domain\User;

class UserDAO implements UserProviderInterface
{

    /** @var Connection  */
    private $db;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    public function find($id) {
        $sql = "select * from user where id=?";
        $row = $this->db->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildUser($row);
        else
            throw new \Exception("No user matching id " . $id);
    }

    public function loadUserByUsername($username)
    {
        $sql = "select * from user where name=?";
        $row = $this->db->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildUser($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return 'stpaul\Domain\User' === $class;
    }

    protected function buildUser($row) {
        return new User($row['id'],$row['name'],$row['password'],$row['salt'],$row['role']);
    }

}