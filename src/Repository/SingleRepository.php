<?php

namespace App\Repository;

use App\Entity\Single;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Single|null find($id, $lockMode = null, $lockVersion = null)
 * @method Single|null findOneBy(array $criteria, array $orderBy = null)
 * @method Single[]    findAll()
 * @method Single[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SingleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Single::class);
    }

    // /**
    //  * @return Single[] Returns an array of Single objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Single
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
