<?php

namespace App\DataFixtures;

use App\Entity\DispoOuverture;
use App\Entity\Etablissement;
use App\Entity\ImagesRestaurants;
use App\Entity\Tags;
use App\Entity\TypeCuisine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Je créer mes différents types de cuisine
        $typeCuisineAfricaine = new TypeCuisine();
        $typeCuisineAfricaine->setNom('Africaine');
        $manager->persist($typeCuisineAfricaine);

        $typeCuisineAlgerien = new TypeCuisine();
        $typeCuisineAlgerien->setNom('Algérienne');
        $manager->persist($typeCuisineAlgerien);

        $typeCuisineAllemande = new TypeCuisine();
        $typeCuisineAllemande->setNom('Allemande');
        $manager->persist($typeCuisineAllemande);

        $typeCuisineAmericaine = new TypeCuisine();
        $typeCuisineAmericaine->setNom('Americaine');
        $manager->persist($typeCuisineAmericaine);

        $typeCuisineArgentine = new TypeCuisine();
        $typeCuisineArgentine->setNom('Argentine');
        $manager->persist($typeCuisineArgentine);

        $typeCuisineAsiatique = new TypeCuisine();
        $typeCuisineAsiatique->setNom('Asiatique');
        $manager->persist($typeCuisineAsiatique);

        $typeCuisineBelge = new TypeCuisine();
        $typeCuisineBelge->setNom('Belge');
        $manager->persist($typeCuisineBelge);

        $typeCuisineCreole = new TypeCuisine();
        $typeCuisineCreole->setNom('Cajun & Créole');
        $manager->persist($typeCuisineCreole);

        $typeCuisineCanadienne = new TypeCuisine();
        $typeCuisineCanadienne->setNom('Canadienne');
        $manager->persist($typeCuisineCanadienne);

        $typeCuisineEspagnole = new TypeCuisine();
        $typeCuisineEspagnole->setNom('Espagnole');
        $manager->persist($typeCuisineEspagnole);

        $typeCuisineFrancaise = new TypeCuisine();
        $typeCuisineFrancaise->setNom('Française');
        $manager->persist($typeCuisineFrancaise);

        $typeCuisineIndienne = new TypeCuisine();
        $typeCuisineIndienne->setNom('Indienne');
        $manager->persist($typeCuisineIndienne);

        $typeCuisineItalienne = new TypeCuisine();
        $typeCuisineItalienne->setNom('Italienne');
        $manager->persist($typeCuisineItalienne);

        $typeCuisineJaponaise = new TypeCuisine();
        $typeCuisineJaponaise->setNom('Japonaise');
        $manager->persist($typeCuisineJaponaise);

        $typeCuisineMarocaine = new TypeCuisine();
        $typeCuisineMarocaine->setNom('Marocaine');
        $manager->persist($typeCuisineMarocaine);

        $typeCuisineMexicaine = new TypeCuisine();
        $typeCuisineMexicaine->setNom('Mexicaine');
        $manager->persist($typeCuisineMexicaine);

        $typeCuisineTurque = new TypeCuisine();
        $typeCuisineTurque->setNom('Turque');
        $manager->persist($typeCuisineTurque);
// ***************************************************************************************************************************************************

        // Je créer ensuite mes différents tags

        $tagVegetarien = new Tags();
        $tagVegetarien->setNom('Végétariens');
        $manager->persist($tagVegetarien);

        $tagHalal = new Tags();
        $tagHalal->setNom('Halal');
        $manager->persist($tagHalal);

        $tagCasher = new Tags();
        $tagCasher->setNom('Casher');
        $manager->persist($tagCasher);

        $tagSansGluten = new Tags();
        $tagSansGluten->setNom('Sans Gluten');
        $manager->persist($tagSansGluten);

        $tagFamilleEnfants = new Tags();
        $tagFamilleEnfants->setNom('Familles avec enfants');
        $manager->persist($tagFamilleEnfants);

        $tagReunionAffaires = new Tags();
        $tagReunionAffaires->setNom('Réunions d\'affaires');
        $manager->persist($tagReunionAffaires);

        $tagCuisineLocale = new Tags();
        $tagCuisineLocale->setNom('Cuisine locale');
        $manager->persist($tagCuisineLocale);

        $tagAmericain = new Tags();
        $tagAmericain->setNom('Americain');
        $manager->persist($tagAmericain);

        $tagBurgers = new Tags();
        $tagBurgers->setNom('Burgers');
        $manager->persist($tagBurgers);

        $tagCreperie = new Tags();
        $tagCreperie->setNom('Crêperie');
        $manager->persist($tagCreperie);

        $tagFastFood = new Tags();
        $tagFastFood->setNom('Fast-Food');
        $manager->persist($tagFastFood);

        $tagGastro = new Tags();
        $tagGastro->setNom('Gastronomique');
        $manager->persist($tagGastro);

        $tagTradi = new Tags();
        $tagTradi->setNom('Traditionnelle');
        $manager->persist($tagTradi);

        $tagKebab = new Tags();
        $tagKebab->setNom('Kebab');
        $manager->persist($tagKebab);

        $tagPizza = new Tags();
        $tagPizza->setNom('Pizza');
        $manager->persist($tagPizza);

        $tagSalades = new Tags();
        $tagSalades->setNom('Salades');
        $manager->persist($tagSalades);

        $tagSandwich = new Tags();
        $tagSandwich->setNom('Sandwich');
        $manager->persist($tagSandwich);

        $tagSushi = new Tags();
        $tagSushi->setNom('Sushi');
        $manager->persist($tagSushi);

        $tagTacos = new Tags();
        $tagTacos->setNom('Tacos');
        $manager->persist($tagTacos);

        $tagSnack = new Tags();
        $tagSnack->setNom('Snack');
        $manager->persist($tagSnack);

        $tagAVolonter = new Tags();
        $tagAVolonter->setNom('A Volonter');
        $manager->persist($tagAVolonter);

// ***************************************************************************************************************************************************
    // J'ajoute tous les cas de dispo_ouverture possible
        // Le Lundi
        $lundiFullService = new DispoOuverture();
        $lundiFullService->setNomJour('lundi');
        $lundiFullService->setServiceMidi(true);
        $lundiFullService->setServiceSoir(true);
        $manager->persist($lundiFullService);

        $lundiAnyService = new DispoOuverture();
        $lundiAnyService->setNomJour('lundi');
        $lundiAnyService->setServiceMidi(false);
        $lundiAnyService->setServiceSoir(false);
        $manager->persist($lundiAnyService);

        $lundiServiceMidi = new DispoOuverture();
        $lundiServiceMidi->setNomJour('lundi');
        $lundiServiceMidi->setServiceMidi(true);
        $lundiServiceMidi->setServiceSoir(false);
        $manager->persist($lundiServiceMidi);

        $lundiServiceSoir = new DispoOuverture();
        $lundiServiceSoir->setNomJour('lundi');
        $lundiServiceSoir->setServiceMidi(false);
        $lundiServiceSoir->setServiceSoir(true);
        $manager->persist($lundiServiceSoir);

        // Le Mardi
        $mardiFullService = new DispoOuverture();
        $mardiFullService->setNomJour('mardi');
        $mardiFullService->setServiceMidi(true);
        $mardiFullService->setServiceSoir(true);
        $manager->persist($mardiFullService);

        $mardiAnyService = new DispoOuverture();
        $mardiAnyService->setNomJour('mardi');
        $mardiAnyService->setServiceMidi(false);
        $mardiAnyService->setServiceSoir(false);
        $manager->persist($mardiAnyService);

        $mardiServiceMidi = new DispoOuverture();
        $mardiServiceMidi->setNomJour('mardi');
        $mardiServiceMidi->setServiceMidi(true);
        $mardiServiceMidi->setServiceSoir(false);
        $manager->persist($mardiServiceMidi);

        $mardiServiceSoir = new DispoOuverture();
        $mardiServiceSoir->setNomJour('mardi');
        $mardiServiceSoir->setServiceMidi(false);
        $mardiServiceSoir->setServiceSoir(true);
        $manager->persist($mardiServiceSoir);

        // Le Mercredi
        $mercrediFullService = new DispoOuverture();
        $mercrediFullService->setNomJour('mercredi');
        $mercrediFullService->setServiceMidi(true);
        $mercrediFullService->setServiceSoir(true);
        $manager->persist($mercrediFullService);

        $mercrediAnyService = new DispoOuverture();
        $mercrediAnyService->setNomJour('mercredi');
        $mercrediAnyService->setServiceMidi(false);
        $mercrediAnyService->setServiceSoir(false);
        $manager->persist($mercrediAnyService);

        $mercrediServiceMidi = new DispoOuverture();
        $mercrediServiceMidi->setNomJour('mercredi');
        $mercrediServiceMidi->setServiceMidi(true);
        $mercrediServiceMidi->setServiceSoir(false);
        $manager->persist($mercrediServiceMidi);

        $mercrediServiceSoir = new DispoOuverture();
        $mercrediServiceSoir->setNomJour('mercredi');
        $mercrediServiceSoir->setServiceMidi(false);
        $mercrediServiceSoir->setServiceSoir(true);
        $manager->persist($mercrediServiceSoir);

        // Le Jeudi
        $jeudiFullService = new DispoOuverture();
        $jeudiFullService->setNomJour('jeudi');
        $jeudiFullService->setServiceMidi(true);
        $jeudiFullService->setServiceSoir(true);
        $manager->persist($jeudiFullService);

        $jeudiAnyService = new DispoOuverture();
        $jeudiAnyService->setNomJour('jeudi');
        $jeudiAnyService->setServiceMidi(false);
        $jeudiAnyService->setServiceSoir(false);
        $manager->persist($jeudiAnyService);

        $jeudiServiceMidi = new DispoOuverture();
        $jeudiServiceMidi->setNomJour('jeudi');
        $jeudiServiceMidi->setServiceMidi(true);
        $jeudiServiceMidi->setServiceSoir(false);
        $manager->persist($jeudiServiceMidi);

        $jeudiServiceSoir = new DispoOuverture();
        $jeudiServiceSoir->setNomJour('jeudi');
        $jeudiServiceSoir->setServiceMidi(false);
        $jeudiServiceSoir->setServiceSoir(true);
        $manager->persist($jeudiServiceSoir);

        // Le Vendredi
        $vendrediFullService = new DispoOuverture();
        $vendrediFullService->setNomJour('vendredi');
        $vendrediFullService->setServiceMidi(true);
        $vendrediFullService->setServiceSoir(true);
        $manager->persist($vendrediFullService);

        $vendrediAnyService = new DispoOuverture();
        $vendrediAnyService->setNomJour('vendredi');
        $vendrediAnyService->setServiceMidi(false);
        $vendrediAnyService->setServiceSoir(false);
        $manager->persist($vendrediAnyService);

        $vendrediServiceMidi = new DispoOuverture();
        $vendrediServiceMidi->setNomJour('vendredi');
        $vendrediServiceMidi->setServiceMidi(true);
        $vendrediServiceMidi->setServiceSoir(false);
        $manager->persist($vendrediServiceMidi);

        $vendrediServiceSoir = new DispoOuverture();
        $vendrediServiceSoir->setNomJour('vendredi');
        $vendrediServiceSoir->setServiceMidi(false);
        $vendrediServiceSoir->setServiceSoir(true);
        $manager->persist($vendrediServiceSoir);

        // Le Samedi
        $samediFullService = new DispoOuverture();
        $samediFullService->setNomJour('samedi');
        $samediFullService->setServiceMidi(true);
        $samediFullService->setServiceSoir(true);
        $manager->persist($samediFullService);

        $samediAnyService = new DispoOuverture();
        $samediAnyService->setNomJour('samedi');
        $samediAnyService->setServiceMidi(false);
        $samediAnyService->setServiceSoir(false);
        $manager->persist($samediAnyService);

        $samediServiceMidi = new DispoOuverture();
        $samediServiceMidi->setNomJour('samedi');
        $samediServiceMidi->setServiceMidi(true);
        $samediServiceMidi->setServiceSoir(false);
        $manager->persist($samediServiceMidi);

        $samediServiceSoir = new DispoOuverture();
        $samediServiceSoir->setNomJour('samedi');
        $samediServiceSoir->setServiceMidi(false);
        $samediServiceSoir->setServiceSoir(true);
        $manager->persist($samediServiceSoir);

        // Le Dimanche
        $dimancheFullService = new DispoOuverture();
        $dimancheFullService->setNomJour('dimanche');
        $dimancheFullService->setServiceMidi(true);
        $dimancheFullService->setServiceSoir(true);
        $manager->persist($dimancheFullService);

        $dimancheAnyService = new DispoOuverture();
        $dimancheAnyService->setNomJour('dimanche');
        $dimancheAnyService->setServiceMidi(false);
        $dimancheAnyService->setServiceSoir(false);
        $manager->persist($dimancheAnyService);

        $dimancheServiceMidi = new DispoOuverture();
        $dimancheServiceMidi->setNomJour('dimanche');
        $dimancheServiceMidi->setServiceMidi(true);
        $dimancheServiceMidi->setServiceSoir(false);
        $manager->persist($dimancheServiceMidi);

        $dimancheServiceSoir = new DispoOuverture();
        $dimancheServiceSoir->setNomJour('dimanche');
        $dimancheServiceSoir->setServiceMidi(false);
        $dimancheServiceSoir->setServiceSoir(true);
        $manager->persist($dimancheServiceSoir);

// ***************************************************************************************************************************************************
        // J'ajoute un établissement puis ses dispo ouvertures et ses images
        // Dabord les info de l'établissement -- 1ER ETABLISSEMENT
        $leMadras = new Etablissement();
        $leMadras->setNom('Le Madras');
        $leMadras->setRue('8 rue Ramond');
        $leMadras->setVille('Clermont-Fd');
        $leMadras->setCodePostal('63000');
        $leMadras->setAccepteReservation(true);
        $leMadras->setDescription('lorem ipsum');
        $leMadras->setNote(4);
        $leMadras->setNbrePlaceTotal(60);
        $leMadras->setServiceMidiDebutTime(new \DateTime("11:30:00"));
        $leMadras->setServiceMidiFinTime(new \DateTime("14:00:00"));
        $leMadras->setServiceSoirDebutTime(new \DateTime("18:30:00"));
        $leMadras->setServiceSoirFinTime(new \DateTime("22:00:00"));
        $leMadras->setIdTypeCuisine($typeCuisineIndienne);
        $leMadras->addTag($tagVegetarien);
        $leMadras->addTag($tagHalal);
        $leMadras->setNumTelephone('+33 4 73 29 61 67');
        $leMadras->setSlugFolderImage('le_madras');
        $leMadras->setSlugMenu('menu.jpg');
        // Les jour d'ouverture -> dispo
        $leMadrasArrayDispo = [$lundiServiceSoir, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheFullService];
        foreach ($leMadrasArrayDispo as $jourDispo){
            $leMadras->addDispoOuverture($jourDispo);
        }

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
        $lEnBut->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $lEnBut->setNote(5);
        $lEnBut->setNbrePlaceTotal(40);
        $lEnBut->setServiceMidiDebutTime(new \DateTime("12:00:00"));
        $lEnBut->setServiceMidiFinTime(new \DateTime("13:30:00"));
        $lEnBut->setServiceSoirDebutTime(new \DateTime("19:30:00"));
        $lEnBut->setServiceSoirFinTime(new \DateTime("21:00:00"));
        $lEnBut->setIdTypeCuisine($typeCuisineFrancaise);
        $lEnBut->addTag($tagGastro);
        $lEnBut->addTag($tagReunionAffaires);
        $lEnBut->setNumTelephone('+33 4 73 90 68 15');
        $lEnBut->setSlugFolderImage('l_en_but');
        $lEnBut->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $lEnButArrayDispo = [$lundiAnyService, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheAnyService];
        foreach ($lEnButArrayDispo as $jourDispo){
            $lEnBut->addDispoOuverture($jourDispo);
        }

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
        $califorU->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $califorU->setNote(4.5);
        $califorU->setNbrePlaceTotal(30);
        $califorU->setServiceMidiDebutTime(new \DateTime("12:00:00"));
        $califorU->setServiceMidiFinTime(new \DateTime("14:30:00"));
        $califorU->setServiceSoirDebutTime(new \DateTime("19:00:00"));
        $califorU->setServiceSoirFinTime(new \DateTime("22:30:00"));
        $califorU->setIdTypeCuisine($typeCuisineJaponaise);
        $califorU->addTag($tagAVolonter);
        $califorU->addTag($tagSushi);
        $califorU->setNumTelephone('+33 4 85 19 01 58');
        $califorU->setSlugFolderImage('califor_u');
        $califorU->setSlugMenu('menu.jpg');
        // Les jour d'ouverture -> dispo
        $califorUArrayDispo = [$lundiServiceSoir, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheServiceSoir];
        foreach ($califorUArrayDispo as $jourDispo){
            $califorU->addDispoOuverture($jourDispo);
        }

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
        $fouquets->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $fouquets->setNote(4.2);
        $fouquets->setNbrePlaceTotal(80);
        $fouquets->setServiceMidiDebutTime(new \DateTime("7:30:00"));
        $fouquets->setServiceMidiFinTime(new \DateTime("16:00:00"));
        $fouquets->setServiceSoirDebutTime(new \DateTime("16:00:00"));
        $fouquets->setServiceSoirFinTime(new \DateTime("1:00:00"));
        $fouquets->setIdTypeCuisine($typeCuisineFrancaise);
        $fouquets->addTag($tagGastro);
        $fouquets->addTag($tagVegetarien);
        $fouquets->setNumTelephone('+33 1 40 69 60 50');
        $fouquets->setSlugFolderImage('fouquets');
        $fouquets->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $fouquetsArrayDispo = [$lundiFullService, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheFullService];
        foreach ($fouquetsArrayDispo as $jourDispo){
            $fouquets->addDispoOuverture($jourDispo);
        }

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
        $kingMarcel->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $kingMarcel->setNote(3.6);
        $kingMarcel->setNbrePlaceTotal(35);
        $kingMarcel->setServiceMidiDebutTime(new \DateTime("11:00:00"));
        $kingMarcel->setServiceMidiFinTime(new \DateTime("15:00:00"));
        $kingMarcel->setServiceSoirDebutTime(new \DateTime("18:00:00"));
        $kingMarcel->setServiceSoirFinTime(new \DateTime("22:00:00"));
        $kingMarcel->setIdTypeCuisine($typeCuisineAmericaine);
        $kingMarcel->addTag($tagFastFood);
        $kingMarcel->addTag($tagBurgers);
        $kingMarcel->setNumTelephone('+33 4 78 24 04 54');
        $kingMarcel->setSlugFolderImage('kingMarcelPartDieu');
        $kingMarcel->setSlugMenu('menu.jpg');
        // Les jour d'ouverture -> dispo
        $kingMarcelArrayDispo = [$lundiFullService, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheFullService];
        foreach ($kingMarcelArrayDispo as $jourDispo){
            $kingMarcel->addDispoOuverture($jourDispo);
        }

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
        $ptitCatsel->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $ptitCatsel->setNote(4.6);
        $ptitCatsel->setNbrePlaceTotal(60);
        $ptitCatsel->setServiceMidiDebutTime(new \DateTime("11:00:00"));
        $ptitCatsel->setServiceMidiFinTime(new \DateTime("14:30:00"));
        $ptitCatsel->setServiceSoirDebutTime(new \DateTime("18:00:00"));
        $ptitCatsel->setServiceSoirFinTime(new \DateTime("22:00:00"));
        $ptitCatsel->setIdTypeCuisine($typeCuisineFrancaise);
        $ptitCatsel->addTag($tagTradi);
        $ptitCatsel->addTag($tagCuisineLocale);
        $ptitCatsel->setNumTelephone('+33 3 84 44 20 50');
        $ptitCatsel->setSlugFolderImage('ptitCastel');
        $ptitCatsel->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $ptitCatselArrayDispo = [$lundiFullService, $mardiAnyService, $mercrediAnyService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheFullService];
        foreach ($ptitCatselArrayDispo as $jourDispo){
            $ptitCatsel->addDispoOuverture($jourDispo);
        }

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
        $brasserieGeorges->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $brasserieGeorges->setNote(3.8);
        $brasserieGeorges->setNbrePlaceTotal(80);
        $brasserieGeorges->setServiceMidiDebutTime(new \DateTime("11:30:00"));
        $brasserieGeorges->setServiceMidiFinTime(new \DateTime("17:30:00"));
        $brasserieGeorges->setServiceSoirDebutTime(new \DateTime("17:30:00"));
        $brasserieGeorges->setServiceSoirFinTime(new \DateTime("23:00:00"));
        $brasserieGeorges->setIdTypeCuisine($typeCuisineFrancaise);
        $brasserieGeorges->addTag($tagGastro);
        $brasserieGeorges->addTag($tagVegetarien);
        $brasserieGeorges->setNumTelephone('+33 4 72 56 54 54');
        $brasserieGeorges->setSlugFolderImage('brasserieGeorges');
        $brasserieGeorges->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $brasserieGeorgesArrayDispo = [$lundiFullService, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheFullService];
        foreach ($brasserieGeorgesArrayDispo as $jourDispo){
            $brasserieGeorges->addDispoOuverture($jourDispo);
        }

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
        $chamasTacosLyon->setDescription('lorem ipsum blabla bla bla blablabla Lorem');
        $chamasTacosLyon->setNote(3.5);
        $chamasTacosLyon->setNbrePlaceTotal(30);
        $chamasTacosLyon->setServiceMidiDebutTime(new \DateTime("11:00:00"));
        $chamasTacosLyon->setServiceMidiFinTime(new \DateTime("14:30:00"));
        $chamasTacosLyon->setServiceSoirDebutTime(new \DateTime("18:00:00"));
        $chamasTacosLyon->setServiceSoirFinTime(new \DateTime("23:00:00"));
        $chamasTacosLyon->setIdTypeCuisine($typeCuisineFrancaise);
        $chamasTacosLyon->addTag($tagFastFood);
        $chamasTacosLyon->addTag($tagTacos);
        $chamasTacosLyon->setNumTelephone('+33 4 78 29 55 59');
        $chamasTacosLyon->setSlugFolderImage('chamasTacosLyon');
        $chamasTacosLyon->setSlugMenu('menu.pdf');
        // Les jour d'ouverture -> dispo
        $chamasTacosLyonArrayDispo = [$lundiFullService, $mardiFullService, $mercrediFullService, $jeudiFullService, $vendrediFullService, $samediFullService, $dimancheFullService];
        foreach ($chamasTacosLyonArrayDispo as $jourDispo){
            $chamasTacosLyon->addDispoOuverture($jourDispo);
        }

        $manager->persist($chamasTacosLyon);
        // J'ajoute les images

        $chamasTacosLyonArrayImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($chamasTacosLyonArrayImages as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageForBdd->setUrl($imageUrl);
            $imageForBdd->setIdEtablissement($chamasTacosLyon);
            $manager->persist($imageForBdd);
        }

        // J'envoie en BDD mes datas
        $manager->flush();
    }
}
