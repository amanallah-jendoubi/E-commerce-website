<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }


    public function findFlashSaleProducts(): array
    {

        $since = new \DateTime('-7 days');

        return $this->createQueryBuilder('p')
            ->select('p')
            ->innerJoin('p.orderLines', 'ol')
            ->innerJoin('ol.customerOrder', 'co')
            ->where('co.date >= :since')
            ->setParameter('since', $since)
            ->groupBy('p.id')
            ->orderBy('SUM(ol.quantity)', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }



    // src/Repository/ProductRepository.php
    public function findBestSellingProducts(): array
    {
        $since = new \DateTime('-30 days');  // Changed from -7 to -30 days

        return $this->createQueryBuilder('p')
            ->select('p')
            ->innerJoin('p.orderLines', 'ol')
            ->innerJoin('ol.customerOrder', 'co')
            ->where('co.date >= :since')
            ->setParameter('since', $since)
            ->groupBy('p.id')
            ->orderBy('SUM(ol.quantity)', 'DESC')
            ->setMaxResults(10)  // Top 10 best selling
            ->getQuery()
            ->getResult();
    }



//    /**
//     * @return Product[] Returns an array of Product objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Product
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
