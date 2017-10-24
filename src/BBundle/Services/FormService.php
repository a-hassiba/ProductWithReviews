<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 20:08
 */

namespace BBundle\Services;

use Doctrine\ORM\EntityManagerInterface;

class FormService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->productRepository = $this->entityManager->getRepository('BBundle\Entity\Product');
    }

    /**
     * @return mixed
     */
    public function getProductQuery()
    {
        $filterBuilder = $this->entityManager
            ->getRepository('BBundle:Product')
            ->createQueryBuilder('e');

        return $filterBuilder;
    }

    /**
     * @param $query
     * @return array
     */
    public function executeQuerry($query)
    {
        $querySQL = $this->entityManager->createQuery($query);
        return $querySQL->getResult(true);
    }

    /**
     * @return array
     */
    public function getAllCategories()
    {
        $query = $this->entityManager->createQueryBuilder();
        $query
            ->select('p.category')
            ->from('BBundle:Product', 'p')
        ;

        $categories = $query->getQuery()->getResult();

        $res = array();

        foreach ($categories as $category) {
            $cat = $category['category'];
            $res[$cat] = $cat;
        }

        return $res;
    }

    public function getProductForCategory($category)
    {
        $query = $this->entityManager->createQueryBuilder();
        $query
            ->select('p')
            ->from('BBundle:Product', 'p')
            ->andWhere('p.category = :category')
            ->setParameter('category', $category)
        ;
        return $query->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
    }

    public function getAllProducts()
    {
        $query = $this->entityManager->createQueryBuilder();
        $query
            ->select('p')
            ->from('BBundle:Product', 'p')
        ;
        return $query->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
    }
}