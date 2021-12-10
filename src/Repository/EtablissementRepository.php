<?php

namespace App\Repository;

use App\Entity\Etablissement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Etablissement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etablissement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etablissement[]    findAll()
 * @method Etablissement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtablissementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etablissement::class);
    }

     /**
      * @return Etablissement[] Returns an array of Etablissement objects
     */

    public function getRestoWhitoutTypeCuisine($nom, $codePostal)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.nom LIKE :val')
            ->andWhere('e.code_postal LIKE :cp')
            ->setParameter('val', '%'.$nom.'%')
            ->setParameter('cp',$codePostal.'%')
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Etablissement[] Returns an array of Etablissement objects
     */

    public function getRestoWithTypeCuisine($nom, $codePostal, $tc)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.id_type_cuisine = :val')
            ->andWhere('e.nom LIKE :nom')
            ->andWhere('e.code_postal LIKE :cp')
            ->setParameter('val', $tc)
            ->setParameter('nom', '%'.$nom.'%')
            ->setParameter('cp',$codePostal.'%')
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Etablissement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
