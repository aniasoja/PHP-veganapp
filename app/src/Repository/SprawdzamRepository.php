<?php

namespace App\Repository;

use App\Entity\Sprawdzam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sprawdzam|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sprawdzam|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sprawdzam[]    findAll()
 * @method Sprawdzam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SprawdzamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sprawdzam::class);
    }

    // /**
    //  * @return Sprawdzam[] Returns an array of Sprawdzam objects
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
    public function findOneBySomeField($value): ?Sprawdzam
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
