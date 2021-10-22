<?php

namespace App\Repository;

use App\Entity\DispoOuverture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DispoOuverture|null find($id, $lockMode = null, $lockVersion = null)
 * @method DispoOuverture|null findOneBy(array $criteria, array $orderBy = null)
 * @method DispoOuverture[]    findAll()
 * @method DispoOuverture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DispoOuvertureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DispoOuverture::class);
    }

    // /**
    //  * @return DispoOuverture[] Returns an array of DispoOuverture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DispoOuverture
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
