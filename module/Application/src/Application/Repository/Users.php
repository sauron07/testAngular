<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 9/8/14
 * Time: 7:23 PM
 */

namespace Application\Repository;


use Application\Entity\User;
use Doctrine\ORM\EntityRepository;

class Users extends EntityRepository
{
    public function getAll()
    {
        return $this->_em->createQueryBuilder()
            ->select('users')
            ->from($this->_entityName, 'users')
            ->getQuery()
            ->getArrayResult();
    }

    public function createUser(User $user, $data)
    {
        $user->setFullName($data->fullName);
        $this->_em->persist($user);
        $this->_em->flush();
    }
}