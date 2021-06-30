<?php

namespace App\Repository;

use App\Entity\Othmen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Othmen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Othmen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Othmen[]    findAll()
 * @method Othmen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OthmenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Othmen::class);
    }

    // /**
    //  * @return Othmen[] Returns an array of Othmen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Othmen
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
