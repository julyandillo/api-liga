<?php

namespace App\Repository;

use App\Entity\Arbitro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Arbitro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arbitro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arbitro[]    findAll()
 * @method Arbitro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArbitroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arbitro::class);
    }

    // /**
    //  * @return Arbitro[] Returns an array of Arbitro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Arbitro
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
