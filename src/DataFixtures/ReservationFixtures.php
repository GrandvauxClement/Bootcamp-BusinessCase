<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $restaurants = [
            $this->getReference('le_madras'), $this->getReference('l_en_but'),
            $this->getReference('califor_u'), $this->getReference('fouquets'),
            $this->getReference('kingMarcelPartDieu'), $this->getReference('ptitCastel'),
            $this->getReference('brasserieGeorges'), $this->getReference('chamasTacosLyon'),
            $this->getReference('lAffreuxJojo'), $this->getReference('leNeuviemeArt'),
            $this->getReference('leDauphinoix'), $this->getReference('laPetiteIdee'),
            $this->getReference('lHambourgeois')

        ];
        $allEtat = [
            $this->getReference('etat-refuser'), $this->getReference('etat-en attente'),
            $this->getReference('etat-accepter')
        ];

        for ($i=0; $i<200; $i++ ){
            $randResto = $restaurants[array_rand($restaurants,1 )];

            $reservation = new Reservation($randResto);

            $reservation->setNom($faker->lastName);
            $reservation->setPrenom($faker->firstName);
            $date = $faker->dateTimeBetween('now', '+3 week');
            $dateValide = false;
            $nomJour = $this->getNameOfDay($date->format('w'));
            while (!$dateValide) {
                if ($randResto instanceof Etablissement){
                    foreach ($randResto->getRelationRestoJourDispos() as $dispo){
                        if ($dispo->getNomJour()->getNom() == $nomJour){
                            if ($dispo->getDispoOuverture()->getServiceMidi() || $dispo->getDispoOuverture()->getServiceSoir()){
                                $reservation->setDateReservation($date);
                                $dateValide = true;
                                $arrayHourOpen = [];
                                if ($dispo->getDispoOuverture()->getServiceMidi()){
                                    $timeBegin = $randResto->getServiceMidiDebutTime();
                                    $timeEnd = $randResto->getServiceMidiFinTime();
                                    while ($timeBegin < $timeEnd){
                                        array_push($arrayHourOpen, $timeBegin );
                                        $timeBegin->add(new \DateInterval('PT30M'));
                                    }
                                }
                                if ($dispo->getDispoOuverture()->getServiceSoir()){
                                    $timeBegin = $randResto->getServiceSoirDebutTime();
                                    $timeEnd = $randResto->getServiceSoirFinTime();
                                    while ($timeBegin < $timeEnd){
                                        array_push($arrayHourOpen, $timeBegin );
                                        $timeBegin->add(new \DateInterval('PT30M'));
                                    }
                                }
                                if (empty($arrayHourOpen)){
                                   $reservation->setHeureArrive($timeBegin);
                                } else {
                                    $reservation->setHeureArrive($arrayHourOpen[array_rand($arrayHourOpen, 1)]);
                                }

                            }
                        }
                    }
                    $date = $faker->dateTimeBetween('now', '+3 week');
                    $nomJour = $this->getNameOfDay($date->format('w'));
                }
            }
            $reservation->setNumTel($faker->phoneNumber);
            $reservation->setNbrePlace(random_int(1,12));
            $reservation->setIdEtatReservation($allEtat[array_rand($allEtat, 1)]);
            $manager->persist($reservation);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getNameOfDay($numDay){
        if ($numDay == 0){
            return 'dimanche';
        } elseif ( $numDay == 1){
            return 'lundi';
        } elseif ( $numDay == 2) {
            return 'mardi';
        } elseif ($numDay == 3) {
            return 'mercredi';
        } elseif ( $numDay == 4) {
            return 'jeudi';
        } elseif ($numDay == 5) {
            return 'vendredi';
        } else {
            return 'samedi';
        }
    }

    public function getDependencies()
    {
        return [
            RelationRestoJourDispoFixtures::class,
            EtatReservationFixtures::class
        ];
    }
}
