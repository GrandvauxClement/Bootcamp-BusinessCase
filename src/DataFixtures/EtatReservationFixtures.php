<?php

namespace App\DataFixtures;

use App\Entity\EtatReservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $allEtat = ['refuser', 'en attente', 'accepter'];
        foreach ($allEtat as $etat){
            $er = new EtatReservation();
            $er->setLibelle($etat);
            $this->addReference('etat-'.$etat, $er);
            $manager->persist($er);
        }

        $manager->flush();
    }
}
