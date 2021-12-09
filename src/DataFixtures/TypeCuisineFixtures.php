<?php

namespace App\DataFixtures;

use App\Entity\TypeCuisine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeCuisineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $allTypesCuisine = ['Africaine'=>'African', 'Algérienne'=>'Algerian', 'Allemande'=>'German', 'Americaine'=>'American',
            'Asiatique'=>'Asian', 'Belge'=>'Belgian', 'Cajun & Créole'=>'Cajun & Créole', 'Canadienne'=>'Canadian',
            'Espagnole'=>'Spanish', 'Française'=>'French', 'Indienne'=>'Indian', 'Italienne'=>'Italian',
            'Japonaise'=>'Japanese', 'Marocaine'=>'Moroccan', 'Mexicaine'=>'Mexican', 'Turque'=>'Turkish'];
        $repoTranslate = $manager->getRepository('Gedmo\\Translatable\\Entity\\Translation');

        foreach ($allTypesCuisine as $typeFr => $typeEn){
            $tc = new TypeCuisine();
            $tc->setNom($typeFr);
            $repoTranslate->translate($tc,'nom','en', $typeEn);
            $this->addReference('type'.$typeFr, $tc);
            $manager->persist($tc);
        }

        $manager->flush();
    }
}
