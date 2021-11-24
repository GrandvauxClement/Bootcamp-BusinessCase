<?php

namespace App\DataFixtures;

use App\Entity\DispoOuverture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DispoOuverturesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $fullDispo = new DispoOuverture();
        $fullDispo->setServiceSoir(true);
        $fullDispo->setServiceMidi(true);
        $this->addReference('fullDispo', $fullDispo);
        $manager->persist($fullDispo);


        $onlyLunchDispo = new DispoOuverture();
        $onlyLunchDispo->setServiceSoir(false);
        $onlyLunchDispo->setServiceMidi(true);
        $this->addReference('onlyLunchDispo', $onlyLunchDispo);
        $manager->persist($onlyLunchDispo);

        $onlyDinerDispo = new DispoOuverture();
        $onlyDinerDispo->setServiceSoir(true);
        $onlyDinerDispo->setServiceMidi(false);
        $this->addReference('onlyDinerDispo', $onlyDinerDispo);
        $manager->persist($onlyDinerDispo);

        $anyDispo = new DispoOuverture();
        $anyDispo->setServiceSoir(false);
        $anyDispo->setServiceMidi(false);
        $this->addReference('anyDispo', $anyDispo);
        $manager->persist($anyDispo);

        $manager->flush();
    }
}
