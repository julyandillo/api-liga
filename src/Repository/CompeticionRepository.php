<?php

namespace App\Repository;

use App\Entity\Competicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Competicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competicion[]    findAll()
 * @method Competicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompeticionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competicion::class);
    }

    // /**
    //  * @return Competicion[] Returns an array of Competicion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Competicion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
