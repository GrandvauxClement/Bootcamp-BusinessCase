<?php

namespace App\Repository;

use App\Entity\Etablissement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
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


     public function search($filtres){

         $query = $this->createQueryBuilder('resto')
         ->leftJoin('resto.id_type_cuisine','tc');

         if(!is_null($filtres['searchBar'])){
            $query->where('resto.nom LIKE :search')
                  ->orWhere('resto.code_postal LIKE :search')
                  ->orWhere('tc.nom LIKE :search');

            $query->setParameter(':search', '%'.$filtres['searchBar'].'%');
         }

         $tableTypeCuisine = $filtres['type_cuisine']->toArray();

         if(count($tableTypeCuisine)){

             $query->andWhere('tc IN (:type_cuisine)')
                   ->setParameter('type_cuisine', $tableTypeCuisine);
         }

         if(!is_null($filtres['departement'])){
             $query->andWhere('resto.code_postal LIKE :number')
                 ->setParameter(':number', $filtres['departement'].'%');
         }

         return $query->getQuery()->getResult();
     }

 /**
   * @return Etablissement[] Returns an array of Etablissement objects
 */

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
