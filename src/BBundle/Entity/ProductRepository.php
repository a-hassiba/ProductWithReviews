<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 11/10/17
 * Time: 23:34
 */

namespace BBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityManagerInterface;

class ProductRepository extends EntityRepository
{
    public function getAllCategories()
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $query
            ->select('category')
        ;

        return $query->getQuery()->getResult();
    }



}