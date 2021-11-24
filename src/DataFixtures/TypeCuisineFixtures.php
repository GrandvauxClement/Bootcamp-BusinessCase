<?php

namespace App\DataFixtures;

use App\Entity\TypeCuisine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeCuisineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $allTypesCuisine = ['Africaine', 'Algérienne', 'Allemande', 'Americaine', 'Argentine', 'Asiatique', 'Belge',
            'Cajun & Créole', 'Canadienne', 'Espagnole', 'Française', 'Indienne', 'Italienne', 'Japonaise', 'Marocaine', 'Mexicaine', 'Turque'];

        foreach ($allTypesCuisine as $type){
            $tc = new TypeCuisine();
            $tc->setNom($type);
            $this->addReference('type'.$type, $tc);
            $manager->persist($tc);
        }

        $manager->flush();
    }
}
