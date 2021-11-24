<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Entity\ImagesRestaurants;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EtablissementFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // Dabord les info de l'établissement -- 1ER ETABLISSEMENT
        $leMadras = new Etablissement();
        $leMadras->setNom('Le Madras');
        $leMadras->setRue('8 rue Ramond');
        $leMadras->setVille('Clermont-Fd');
        $leMadras->setCodePostal('63000');
        $leMadras->setAccepteReservation(true);
        $leMadras->setDescription('lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga');
        $leMadras->setNote(4);
        $leMadras->setNbrePlaceTotal(60);
        $leMadras->setServiceMidiDebutTime(new \DateTime("11:30:00"));
        $leMadras->setServiceMidiFinTime(new \DateTime("14:00:00"));
        $leMadras->setServiceSoirDebutTime(new \DateTime("18:30:00"));
        $leMadras->setServiceSoirFinTime(new \DateTime("22:00:00"));
        $leMadras->setIdTypeCuisine($this->getReference('typeIndienne'));
        $leMadras->addTag($this->getReference('tagVégétariens'));
        $leMadras->addTag($this->getReference('tagHalal'));
        $leMadras->setNumTelephone('+33 4 73 29 61 67');
        $leMadras->setSlugFolderImage('le_madras');
        $leMadras->setSlugMenu('menu.jpg');
        // Les jour d'ouverture -> dispo
        $this->addReference('le_madras', $leMadras);

        $manager->persist($leMadras);
        // J'ajoute les images

        $lemadrasArrayImages = ['le-madras.jpg', 'le-madras-2.jpg', 'le-madras-3.jpg', 'le-madras-4.jpg'];
        foreach ($lemadrasArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($leMadras);
            $manager->persist($imageForBdd);
        }

        //------------------ 2EME ETABLISSEMENT ----------------------------
        $lEnBut = new Etablissement();
        $lEnBut->setNom('L\'En-But');
        $lEnBut->setRue('107 avenue de la Republique');
        $lEnBut->setVille('Clermont-Fd');
        $lEnBut->setCodePostal('63000');
        $lEnBut->setAccepteReservation(true);
        $lEnBut->setDescription('lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga');
        $lEnBut->setNote(5);
        $lEnBut->setNbrePlaceTotal(40);
        $lEnBut->setServiceMidiDebutTime(new \DateTime("12:00:00"));
        $lEnBut->setServiceMidiFinTime(new \DateTime("13:30:00"));
        $lEnBut->setServiceSoirDebutTime(new \DateTime("19:30:00"));
        $lEnBut->setServiceSoirFinTime(new \DateTime("21:00:00"));
        $lEnBut->setIdTypeCuisine($this->getReference('typeFrançaise'));
        $lEnBut->addTag($this->getReference('tagGastronomique'));
        $lEnBut->addTag($this->getReference('tagRéunions d\'affaires'));
        $lEnBut->setNumTelephone('+33 4 73 90 68 15');
        $lEnBut->setSlugFolderImage('l_en_but');
        $lEnBut->setSlugMenu('menu.pdf');
        $this->addReference('l_en_but', $lEnBut);
        // Les jour d'ouverture -> dispo

        $manager->persist($lEnBut);
        // J'ajoute les images

        $lEnButArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($lEnButArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($lEnBut);
            $manager->persist($imageForBdd);
        }

        //------------------ 3EME ETABLISSEMENT ----------------------------
        $califorU = new Etablissement();
        $califorU->setNom('Califor\'U');
        $califorU->setRue('30 Rue Condorcet');
        $califorU->setVille('Grenoble');
        $califorU->setCodePostal('38000');
        $califorU->setAccepteReservation(true);
        $califorU->setDescription('lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga');
        $califorU->setNote(4.5);
        $califorU->setNbrePlaceTotal(30);
        $califorU->setServiceMidiDebutTime(new \DateTime("12:00:00"));
        $califorU->setServiceMidiFinTime(new \DateTime("14:30:00"));
        $califorU->setServiceSoirDebutTime(new \DateTime("19:00:00"));
        $califorU->setServiceSoirFinTime(new \DateTime("22:30:00"));
        $califorU->setIdTypeCuisine($this->getReference('typeJaponaise'));
        $califorU->addTag($this->getReference('tagA Volonter'));
        $califorU->addTag($this->getReference('tagSushi'));
        $califorU->setNumTelephone('+33 4 85 19 01 58');
        $califorU->setSlugFolderImage('califor_u');
        $califorU->setSlugMenu('menu.jpg');
        $this->addReference('califor_u', $califorU);
        // Les jour d'ouverture -> dispo

        $manager->persist($califorU);
        // J'ajoute les images

        $califorUArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($califorUArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($califorU);
            $manager->persist($imageForBdd);
        }

        //------------------ 4EME ETABLISSEMENT ----------------------------
        $fouquets = new Etablissement();
        $fouquets->setNom('Le Fouquet\'s');
        $fouquets->setRue('99 Avenue des Champs-Elysées');
        $fouquets->setVille('Paris');
        $fouquets->setCodePostal('75008');
        $fouquets->setAccepteReservation(true);
        $fouquets->setDescription('\'lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga\'');
        $fouquets->setNote(4.2);
        $fouquets->setNbrePlaceTotal(80);
        $fouquets->setServiceMidiDebutTime(new \DateTime("7:30:00"));
        $fouquets->setServiceMidiFinTime(new \DateTime("16:00:00"));
        $fouquets->setServiceSoirDebutTime(new \DateTime("16:00:00"));
        $fouquets->setServiceSoirFinTime(new \DateTime("1:00:00"));
        $fouquets->setIdTypeCuisine($this->getReference('typeFrançaise'));
        $fouquets->addTag($this->getReference('tagGastronomique'));
        $fouquets->addTag($this->getReference('tagVégétariens'));
        $fouquets->setNumTelephone('+33 1 40 69 60 50');
        $fouquets->setSlugFolderImage('fouquets');
        $fouquets->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $this->addReference('fouquets', $fouquets);
        $manager->persist($fouquets);
        // J'ajoute les images

        $fouquetsArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($fouquetsArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($fouquets);
            $manager->persist($imageForBdd);
        }

        //------------------ 5EME ETABLISSEMENT ----------------------------
        $kingMarcel = new Etablissement();
        $kingMarcel->setNom('King Marcel Part Dieu');
        $kingMarcel->setRue('26 Boulevard Jules Favre');
        $kingMarcel->setVille('Lyon');
        $kingMarcel->setCodePostal('69006');
        $kingMarcel->setAccepteReservation(true);
        $kingMarcel->setDescription('lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga');
        $kingMarcel->setNote(3.6);
        $kingMarcel->setNbrePlaceTotal(35);
        $kingMarcel->setServiceMidiDebutTime(new \DateTime("11:00:00"));
        $kingMarcel->setServiceMidiFinTime(new \DateTime("15:00:00"));
        $kingMarcel->setServiceSoirDebutTime(new \DateTime("18:00:00"));
        $kingMarcel->setServiceSoirFinTime(new \DateTime("22:00:00"));
        $kingMarcel->setIdTypeCuisine($this->getReference('typeAmericaine'));
        $kingMarcel->addTag($this->getReference('tagFast-Food'));
        $kingMarcel->addTag($this->getReference('tagBurgers'));
        $kingMarcel->setNumTelephone('+33 4 78 24 04 54');
        $kingMarcel->setSlugFolderImage('kingMarcelPartDieu');
        $kingMarcel->setSlugMenu('menu.jpg');
        $this->addReference('kingMarcelPartDieu', $kingMarcel);
        // Les jour d'ouverture -> dispo

        $manager->persist($kingMarcel);
        // J'ajoute les images

        $kingMarcelArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($kingMarcelArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($kingMarcel);
            $manager->persist($imageForBdd);
        }


        //------------------ 6EME ETABLISSEMENT ----------------------------
        $ptitCatsel = new Etablissement();
        $ptitCatsel->setNom('Le Ptit Castel');
        $ptitCatsel->setRue('Rue de la Roche');
        $ptitCatsel->setVille('Chateau Chalon');
        $ptitCatsel->setCodePostal('39210');
        $ptitCatsel->setAccepteReservation(true);
        $ptitCatsel->setDescription('lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga');
        $ptitCatsel->setNote(4.6);
        $ptitCatsel->setNbrePlaceTotal(60);
        $ptitCatsel->setServiceMidiDebutTime(new \DateTime("11:00:00"));
        $ptitCatsel->setServiceMidiFinTime(new \DateTime("14:30:00"));
        $ptitCatsel->setServiceSoirDebutTime(new \DateTime("18:00:00"));
        $ptitCatsel->setServiceSoirFinTime(new \DateTime("22:00:00"));
        $ptitCatsel->setIdTypeCuisine($this->getReference('typeFrançaise'));
        $ptitCatsel->addTag($this->getReference('tagTraditionnelle'));
        $ptitCatsel->addTag($this->getReference('tagCuisine locale'));
        $ptitCatsel->setNumTelephone('+33 3 84 44 20 50');
        $ptitCatsel->setSlugFolderImage('ptitCastel');
        $ptitCatsel->setSlugMenu('menu.pdf');
        $this->addReference('ptitCastel', $ptitCatsel);
        // Les jour d'ouverture -> dispo

        $manager->persist($ptitCatsel);
        // J'ajoute les images

        $ptitCatselArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($ptitCatselArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($ptitCatsel);
            $manager->persist($imageForBdd);
        }

        //------------------ 7EME ETABLISSEMENT ----------------------------
        $brasserieGeorges = new Etablissement();
        $brasserieGeorges->setNom('Brasserie Georges');
        $brasserieGeorges->setRue('30 cours de Verdun Perrache');
        $brasserieGeorges->setVille('Lyon');
        $brasserieGeorges->setCodePostal('69002');
        $brasserieGeorges->setAccepteReservation(true);
        $brasserieGeorges->setDescription('lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga');
        $brasserieGeorges->setNote(3.8);
        $brasserieGeorges->setNbrePlaceTotal(80);
        $brasserieGeorges->setServiceMidiDebutTime(new \DateTime("11:30:00"));
        $brasserieGeorges->setServiceMidiFinTime(new \DateTime("17:30:00"));
        $brasserieGeorges->setServiceSoirDebutTime(new \DateTime("17:30:00"));
        $brasserieGeorges->setServiceSoirFinTime(new \DateTime("23:00:00"));
        $brasserieGeorges->setIdTypeCuisine($this->getReference('typeFrançaise'));
        $brasserieGeorges->addTag($this->getReference('tagGastronomique'));
        $brasserieGeorges->addTag($this->getReference('tagVégétariens'));
        $brasserieGeorges->setNumTelephone('+33 4 72 56 54 54');
        $brasserieGeorges->setSlugFolderImage('brasserieGeorges');
        $brasserieGeorges->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $this->addReference('brasserieGeorges', $brasserieGeorges);
        $manager->persist($brasserieGeorges);
        // J'ajoute les images

        $brasserieGeorgesArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($brasserieGeorgesArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($brasserieGeorges);
            $manager->persist($imageForBdd);
        }

        //------------------ 8EME ETABLISSEMENT ----------------------------
        $chamasTacosLyon = new Etablissement();
        $chamasTacosLyon->setNom('Chamas Tacos Lyon');
        $chamasTacosLyon->setRue('10 rue Terme');
        $chamasTacosLyon->setVille('Lyon');
        $chamasTacosLyon->setCodePostal('69001');
        $chamasTacosLyon->setAccepteReservation(true);
        $chamasTacosLyon->setDescription('\'lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui
         blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint 
         occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est 
         laborum et dolorum fuga\'');
        $chamasTacosLyon->setNote(3.5);
        $chamasTacosLyon->setNbrePlaceTotal(30);
        $chamasTacosLyon->setServiceMidiDebutTime(new \DateTime("11:00:00"));
        $chamasTacosLyon->setServiceMidiFinTime(new \DateTime("14:30:00"));
        $chamasTacosLyon->setServiceSoirDebutTime(new \DateTime("18:00:00"));
        $chamasTacosLyon->setServiceSoirFinTime(new \DateTime("23:00:00"));
        $chamasTacosLyon->setIdTypeCuisine($this->getReference('typeFrançaise'));
        $chamasTacosLyon->addTag($this->getReference('tagFast-Food'));
        $chamasTacosLyon->addTag($this->getReference('tagTacos'));
        $chamasTacosLyon->setNumTelephone('+33 4 78 29 55 59');
        $chamasTacosLyon->setSlugFolderImage('chamasTacosLyon');
        $chamasTacosLyon->setSlugMenu('menu.pdf');
        $this->addReference('chamasTacosLyon', $chamasTacosLyon);
        // Les jour d'ouverture -> dispo

        $manager->persist($chamasTacosLyon);
        // J'ajoute les images

        $chamasTacosLyonArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($chamasTacosLyonArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($chamasTacosLyon);
            $manager->persist($imageForBdd);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TagsFixtures::class,
            TypeCuisineFixtures::class,
        ];
    }
}
