<?php

namespace App\Repository;

use App\Entity\Roadmap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Roadmap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Roadmap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Roadmap[]    findAll()
 * @method Roadmap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoadmapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Roadmap::class);
    }

    // /**
    //  * @return Roadmap[] Returns an array of Roadmap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Roadmap
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
