<?php

namespace App\Repository;

use App\Entity\RelationRestoJourDispo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RelationRestoJourDispo|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelationRestoJourDispo|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelationRestoJourDispo[]    findAll()
 * @method RelationRestoJourDispo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelationRestoJourDispoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelationRestoJourDispo::class);
    }

    // /**
    //  * @return RelationRestoJourDispo[] Returns an array of RelationRestoJourDispo objects
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
    public function findOneBySomeField($value): ?RelationRestoJourDispo
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
