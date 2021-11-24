<?php

namespace App\DataFixtures;

use App\Entity\JourSemaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JourSemaineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
        foreach ($jours as $jour){
            $j = new JourSemaine();
            $j->setNom($jour);
            $this->addReference($jour, $j);
            $manager->persist($j);
        }

        $manager->flush();
    }
}
