<?php

namespace Admin\Entity\Repository;

use Admin\Entity\Admin;
use Doctrine\ORM\EntityRepository;

/**
 * AdminRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdminRepository extends EntityRepository
{
    public function loginAdmin(Admin $admin, $login, $senha)
    {
        /**
         * @var $adminLogin \Admin\Entity\Admin
         */
        $adminLogin = $this->createQueryBuilder('a')
            ->where('a.login = :b1')
            ->andWhere('a.status = :b2')
            ->setParameter('b1',$login)
            ->setParameter('b2', 'ATIVO')
            ->getQuery()
            ->getOneOrNullResult();
        //var_dump($adminLogin);die("AdminRepository L 28");
        if(!empty($adminLogin)){
            $admin->setSalt($adminLogin->getSalt());
            if($admin->encryptSenha($senha) == $adminLogin->getSenha()){
                return $adminLogin;
            }
        }
        return false;

    }
}