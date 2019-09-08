<?php

namespace App\Repository;

use App\Entity\Shops;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Shops|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shops|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shops[]    findAll()
 * @method Shops[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Shops::class);
    }

    /**
     * Save record.
     *
     * @param \App\Entity\Shops $shops Shops entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Shops $shops): void
    {
        $this->_em->persist($shops);
        $this->_em->flush($shops);
    }

    // /**
    //  * @return Shops[] Returns an array of Shops objects
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
    public function findOneBySomeField($value): ?Shops
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
