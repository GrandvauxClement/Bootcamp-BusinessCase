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


     public function search(string $terms)
     {

         return $this->createQueryBuilder('resto')
//             ->leftJoin('resto.id_type_cuisine', 'tc')

                ->where('resto.nom LIKE :terms')
                ->setParameter('terms', '%'.$terms.'%')
//                 ->orWhere('resto.code_postal LIKE :search')
//                 ->orWhere('tc.nom LIKE :search')
                 ->getQuery()
                 ->getResult(AbstractQuery::HYDRATE_ARRAY);

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
