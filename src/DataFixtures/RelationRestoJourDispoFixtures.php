<?php

namespace App\DataFixtures;

use App\Entity\RelationRestoJourDispo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RelationRestoJourDispoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // dispo par jour pour le resto le Madras
        $dispoMadrasLundi = new RelationRestoJourDispo();
        $dispoMadrasLundi->setNomJour($this->getReference('lundi'));
        $dispoMadrasLundi->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasLundi->setDispoOuverture($this->getReference('anyDispo'));
        $manager->persist($dispoMadrasLundi);

        $dispoMadrasMardi = new RelationRestoJourDispo();
        $dispoMadrasMardi->setNomJour($this->getReference('mardi'));
        $dispoMadrasMardi->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispoMadrasMardi);

        $dispoMadrasMercredi = new RelationRestoJourDispo();
        $dispoMadrasMercredi->setNomJour($this->getReference('mercredi'));
        $dispoMadrasMercredi->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoMadrasMercredi);

        $dispoMadrasJeudi = new RelationRestoJourDispo();
        $dispoMadrasJeudi->setNomJour($this->getReference('jeudi'));
        $dispoMadrasJeudi->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoMadrasJeudi);

        $dispoMadrasVendredi = new RelationRestoJourDispo();
        $dispoMadrasVendredi->setNomJour($this->getReference('vendredi'));
        $dispoMadrasVendredi->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoMadrasVendredi);

        $dispoMadrasSamedi = new RelationRestoJourDispo();
        $dispoMadrasSamedi->setNomJour($this->getReference('samedi'));
        $dispoMadrasSamedi->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoMadrasSamedi);

        $dispoMadrasDimanche = new RelationRestoJourDispo();
        $dispoMadrasDimanche->setNomJour($this->getReference('dimanche'));
        $dispoMadrasDimanche->setRestaurant($this->getReference('le_madras'));
        $dispoMadrasDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoMadrasDimanche);

         // ******************  Dispo par jour pour le resto l'en but  ****************************************
        $dispolEnButLundi = new RelationRestoJourDispo();
        $dispolEnButLundi->setNomJour($this->getReference('lundi'));
        $dispolEnButLundi->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButLundi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispolEnButLundi);

        $dispolEnButMardi = new RelationRestoJourDispo();
        $dispolEnButMardi->setNomJour($this->getReference('mardi'));
        $dispolEnButMardi->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispolEnButMardi);

        $dispolEnButMercredi = new RelationRestoJourDispo();
        $dispolEnButMercredi->setNomJour($this->getReference('mercredi'));
        $dispolEnButMercredi->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolEnButMercredi);

        $dispolEnButJeudi = new RelationRestoJourDispo();
        $dispolEnButJeudi->setNomJour($this->getReference('jeudi'));
        $dispolEnButJeudi->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolEnButJeudi);

        $dispolEnButVendredi = new RelationRestoJourDispo();
        $dispolEnButVendredi->setNomJour($this->getReference('vendredi'));
        $dispolEnButVendredi->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolEnButVendredi);

        $dispolEnButSamedi = new RelationRestoJourDispo();
        $dispolEnButSamedi->setNomJour($this->getReference('samedi'));
        $dispolEnButSamedi->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolEnButSamedi);

        $dispolEnButDimanche = new RelationRestoJourDispo();
        $dispolEnButDimanche->setNomJour($this->getReference('dimanche'));
        $dispolEnButDimanche->setRestaurant($this->getReference('l_en_but'));
        $dispolEnButDimanche->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispolEnButDimanche);

        // ******************  Dispo par jour pour le resto califor u ****************************************
        $dispoCaliforULundi = new RelationRestoJourDispo();
        $dispoCaliforULundi->setNomJour($this->getReference('lundi'));
        $dispoCaliforULundi->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforULundi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispoCaliforULundi);

        $dispoCaliforUMardi = new RelationRestoJourDispo();
        $dispoCaliforUMardi->setNomJour($this->getReference('mardi'));
        $dispoCaliforUMardi->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforUMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispoCaliforUMardi);

        $dispoCaliforUMercredi = new RelationRestoJourDispo();
        $dispoCaliforUMercredi->setNomJour($this->getReference('mercredi'));
        $dispoCaliforUMercredi->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforUMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoCaliforUMercredi);

        $dispoCaliforUJeudi = new RelationRestoJourDispo();
        $dispoCaliforUJeudi->setNomJour($this->getReference('jeudi'));
        $dispoCaliforUJeudi->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforUJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoCaliforUJeudi);

        $dispoCaliforUVendredi = new RelationRestoJourDispo();
        $dispoCaliforUVendredi->setNomJour($this->getReference('vendredi'));
        $dispoCaliforUVendredi->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforUVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoCaliforUVendredi);

        $dispoCaliforUSamedi = new RelationRestoJourDispo();
        $dispoCaliforUSamedi->setNomJour($this->getReference('samedi'));
        $dispoCaliforUSamedi->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforUSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoCaliforUSamedi);

        $dispoCaliforUDimanche = new RelationRestoJourDispo();
        $dispoCaliforUDimanche->setNomJour($this->getReference('dimanche'));
        $dispoCaliforUDimanche->setRestaurant($this->getReference('califor_u'));
        $dispoCaliforUDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoCaliforUDimanche);

        // ******************  Dispo par jour pour le resto fouquets ****************************************
        $dispoFouquetsLundi = new RelationRestoJourDispo();
        $dispoFouquetsLundi->setNomJour($this->getReference('lundi'));
        $dispoFouquetsLundi->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsLundi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsLundi);

        $dispoFouquetsMardi = new RelationRestoJourDispo();
        $dispoFouquetsMardi->setNomJour($this->getReference('mardi'));
        $dispoFouquetsMardi->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsMardi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsMardi);

        $dispoFouquetsMercredi = new RelationRestoJourDispo();
        $dispoFouquetsMercredi->setNomJour($this->getReference('mercredi'));
        $dispoFouquetsMercredi->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsMercredi);

        $dispoFouquetsJeudi = new RelationRestoJourDispo();
        $dispoFouquetsJeudi->setNomJour($this->getReference('jeudi'));
        $dispoFouquetsJeudi->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsJeudi);

        $dispoFouquetsVendredi = new RelationRestoJourDispo();
        $dispoFouquetsVendredi->setNomJour($this->getReference('vendredi'));
        $dispoFouquetsVendredi->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsVendredi);

        $dispoFouquetsSamedi = new RelationRestoJourDispo();
        $dispoFouquetsSamedi->setNomJour($this->getReference('samedi'));
        $dispoFouquetsSamedi->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsSamedi);

        $dispoFouquetsDimanche = new RelationRestoJourDispo();
        $dispoFouquetsDimanche->setNomJour($this->getReference('dimanche'));
        $dispoFouquetsDimanche->setRestaurant($this->getReference('fouquets'));
        $dispoFouquetsDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoFouquetsDimanche);

        // ******************  Dispo par jour pour le resto kingMarcelPartDieu ****************************************
        $dispoKingMarcelLundi = new RelationRestoJourDispo();
        $dispoKingMarcelLundi->setNomJour($this->getReference('lundi'));
        $dispoKingMarcelLundi->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelLundi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelLundi);

        $dispoKingMarcelMardi = new RelationRestoJourDispo();
        $dispoKingMarcelMardi->setNomJour($this->getReference('mardi'));
        $dispoKingMarcelMardi->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelMardi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelMardi);

        $dispoKingMarcelMercredi = new RelationRestoJourDispo();
        $dispoKingMarcelMercredi->setNomJour($this->getReference('mercredi'));
        $dispoKingMarcelMercredi->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelMercredi);

        $dispoKingMarcelJeudi = new RelationRestoJourDispo();
        $dispoKingMarcelJeudi->setNomJour($this->getReference('jeudi'));
        $dispoKingMarcelJeudi->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelJeudi);

        $dispoKingMarcelVendredi = new RelationRestoJourDispo();
        $dispoKingMarcelVendredi->setNomJour($this->getReference('vendredi'));
        $dispoKingMarcelVendredi->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelVendredi);

        $dispoKingMarcelSamedi = new RelationRestoJourDispo();
        $dispoKingMarcelSamedi->setNomJour($this->getReference('samedi'));
        $dispoKingMarcelSamedi->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelSamedi);

        $dispoKingMarcelDimanche = new RelationRestoJourDispo();
        $dispoKingMarcelDimanche->setNomJour($this->getReference('dimanche'));
        $dispoKingMarcelDimanche->setRestaurant($this->getReference('kingMarcelPartDieu'));
        $dispoKingMarcelDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoKingMarcelDimanche);

        // ******************  Dispo par jour pour le resto Le Petit Catsel****************************************
        $dispoPtitCastelLundi = new RelationRestoJourDispo();
        $dispoPtitCastelLundi->setNomJour($this->getReference('lundi'));
        $dispoPtitCastelLundi->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelLundi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoPtitCastelLundi);

        $dispoPtitCastelMardi = new RelationRestoJourDispo();
        $dispoPtitCastelMardi->setNomJour($this->getReference('mardi'));
        $dispoPtitCastelMardi->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelMardi->setDispoOuverture($this->getReference('anyDispo'));
        $manager->persist($dispoPtitCastelMardi);

        $dispoPtitCastelMercredi = new RelationRestoJourDispo();
        $dispoPtitCastelMercredi->setNomJour($this->getReference('mercredi'));
        $dispoPtitCastelMercredi->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelMercredi->setDispoOuverture($this->getReference('anyDispo'));
        $manager->persist($dispoPtitCastelMercredi);

        $dispoPtitCastelJeudi = new RelationRestoJourDispo();
        $dispoPtitCastelJeudi->setNomJour($this->getReference('jeudi'));
        $dispoPtitCastelJeudi->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelJeudi->setDispoOuverture($this->getReference('anyDispo'));
        $manager->persist($dispoPtitCastelJeudi);

        $dispoPtitCastelVendredi = new RelationRestoJourDispo();
        $dispoPtitCastelVendredi->setNomJour($this->getReference('vendredi'));
        $dispoPtitCastelVendredi->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoPtitCastelVendredi);

        $dispoPtitCastelSamedi = new RelationRestoJourDispo();
        $dispoPtitCastelSamedi->setNomJour($this->getReference('samedi'));
        $dispoPtitCastelSamedi->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoPtitCastelSamedi);

        $dispoPtitCastelDimanche = new RelationRestoJourDispo();
        $dispoPtitCastelDimanche->setNomJour($this->getReference('dimanche'));
        $dispoPtitCastelDimanche->setRestaurant($this->getReference('ptitCastel'));
        $dispoPtitCastelDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoPtitCastelDimanche);

        // ******************  Dispo par jour pour le resto La Brasserie Georges ****************************************
        $dispoBrasserieGeorgeLundi = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeLundi->setNomJour($this->getReference('lundi'));
        $dispoBrasserieGeorgeLundi->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeLundi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoBrasserieGeorgeLundi);

        $dispoBrasserieGeorgeMardi = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeMardi->setNomJour($this->getReference('mardi'));
        $dispoBrasserieGeorgeMardi->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeMardi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoBrasserieGeorgeMardi);

        $dispoBrasserieGeorgeMercredi = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeMercredi->setNomJour($this->getReference('mercredi'));
        $dispoBrasserieGeorgeMercredi->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeMercredi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoBrasserieGeorgeMercredi);

        $dispoBrasserieGeorgeJeudi = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeJeudi->setNomJour($this->getReference('jeudi'));
        $dispoBrasserieGeorgeJeudi->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeJeudi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoBrasserieGeorgeJeudi);

        $dispoBrasserieGeorgeVendredi = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeVendredi->setNomJour($this->getReference('vendredi'));
        $dispoBrasserieGeorgeVendredi->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeVendredi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoBrasserieGeorgeVendredi);

        $dispoBrasserieGeorgeSamedi = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeSamedi->setNomJour($this->getReference('samedi'));
        $dispoBrasserieGeorgeSamedi->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeSamedi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoBrasserieGeorgeSamedi);

        $dispoBrasserieGeorgeDimanche = new RelationRestoJourDispo();
        $dispoBrasserieGeorgeDimanche->setNomJour($this->getReference('dimanche'));
        $dispoBrasserieGeorgeDimanche->setRestaurant($this->getReference('brasserieGeorges'));
        $dispoBrasserieGeorgeDimanche->setDispoOuverture($this->getReference('anyDispo'));
        $manager->persist($dispoBrasserieGeorgeDimanche);


        // ******************  Dispo par jour pour le resto Chamas Tacos Lyon ****************************************
        $dispoChamasTacosLyonLundi = new RelationRestoJourDispo();
        $dispoChamasTacosLyonLundi->setNomJour($this->getReference('lundi'));
        $dispoChamasTacosLyonLundi->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonLundi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonLundi);

        $dispoChamasTacosLyonMardi = new RelationRestoJourDispo();
        $dispoChamasTacosLyonMardi->setNomJour($this->getReference('mardi'));
        $dispoChamasTacosLyonMardi->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonMardi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonMardi);

        $dispoChamasTacosLyonMercredi = new RelationRestoJourDispo();
        $dispoChamasTacosLyonMercredi->setNomJour($this->getReference('mercredi'));
        $dispoChamasTacosLyonMercredi->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonMercredi);

        $dispoChamasTacosLyonJeudi = new RelationRestoJourDispo();
        $dispoChamasTacosLyonJeudi->setNomJour($this->getReference('jeudi'));
        $dispoChamasTacosLyonJeudi->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonJeudi);

        $dispoChamasTacosLyonVendredi = new RelationRestoJourDispo();
        $dispoChamasTacosLyonVendredi->setNomJour($this->getReference('vendredi'));
        $dispoChamasTacosLyonVendredi->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonVendredi);

        $dispoChamasTacosLyonSamedi = new RelationRestoJourDispo();
        $dispoChamasTacosLyonSamedi->setNomJour($this->getReference('samedi'));
        $dispoChamasTacosLyonSamedi->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonSamedi);

        $dispoChamasTacosLyonDimanche = new RelationRestoJourDispo();
        $dispoChamasTacosLyonDimanche->setNomJour($this->getReference('dimanche'));
        $dispoChamasTacosLyonDimanche->setRestaurant($this->getReference('chamasTacosLyon'));
        $dispoChamasTacosLyonDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoChamasTacosLyonDimanche);



        // ******************  Dispo par jour pour le resto l'Affreux Jojo  ****************************************
        $dispolAffreuxJojoLundi = new RelationRestoJourDispo();
        $dispolAffreuxJojoLundi->setNomJour($this->getReference('lundi'));
        $dispolAffreuxJojoLundi->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoLundi->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispolAffreuxJojoLundi);

        $dispolAffreuxJojoMardi = new RelationRestoJourDispo();
        $dispolAffreuxJojoMardi->setNomJour($this->getReference('mardi'));
        $dispolAffreuxJojoMardi->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispolAffreuxJojoMardi);

        $dispolAffreuxJojoMercredi = new RelationRestoJourDispo();
        $dispolAffreuxJojoMercredi->setNomJour($this->getReference('mercredi'));
        $dispolAffreuxJojoMercredi->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolAffreuxJojoMercredi);

        $dispolAffreuxJojoJeudi = new RelationRestoJourDispo();
        $dispolAffreuxJojoJeudi->setNomJour($this->getReference('jeudi'));
        $dispolAffreuxJojoJeudi->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolAffreuxJojoJeudi);

        $dispolAffreuxJojoVendredi = new RelationRestoJourDispo();
        $dispolAffreuxJojoVendredi->setNomJour($this->getReference('vendredi'));
        $dispolAffreuxJojoVendredi->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolAffreuxJojoVendredi);

        $dispolAffreuxJojoSamedi = new RelationRestoJourDispo();
        $dispolAffreuxJojoSamedi->setNomJour($this->getReference('samedi'));
        $dispolAffreuxJojoSamedi->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolAffreuxJojoSamedi);

        $dispolAffreuxJojoDimanche = new RelationRestoJourDispo();
        $dispolAffreuxJojoDimanche->setNomJour($this->getReference('dimanche'));
        $dispolAffreuxJojoDimanche->setRestaurant($this->getReference('lAffreuxJojo'));
        $dispolAffreuxJojoDimanche->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispolAffreuxJojoDimanche);

        // ******************  Dispo par jour pour le resto le Neuvième Art  ****************************************
        $dispoleNeuviemeArtLundi = new RelationRestoJourDispo();
        $dispoleNeuviemeArtLundi->setNomJour($this->getReference('lundi'));
        $dispoleNeuviemeArtLundi->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtLundi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleNeuviemeArtLundi);

        $dispoleNeuviemeArtMardi = new RelationRestoJourDispo();
        $dispoleNeuviemeArtMardi->setNomJour($this->getReference('mardi'));
        $dispoleNeuviemeArtMardi->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispoleNeuviemeArtMardi);

        $dispoleNeuviemeArtMercredi = new RelationRestoJourDispo();
        $dispoleNeuviemeArtMercredi->setNomJour($this->getReference('mercredi'));
        $dispoleNeuviemeArtMercredi->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleNeuviemeArtMercredi);

        $dispoleNeuviemeArtJeudi = new RelationRestoJourDispo();
        $dispoleNeuviemeArtJeudi->setNomJour($this->getReference('jeudi'));
        $dispoleNeuviemeArtJeudi->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleNeuviemeArtJeudi);

        $dispoleNeuviemeArtVendredi = new RelationRestoJourDispo();
        $dispoleNeuviemeArtVendredi->setNomJour($this->getReference('vendredi'));
        $dispoleNeuviemeArtVendredi->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleNeuviemeArtVendredi);

        $dispoleNeuviemeArtSamedi = new RelationRestoJourDispo();
        $dispoleNeuviemeArtSamedi->setNomJour($this->getReference('samedi'));
        $dispoleNeuviemeArtSamedi->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleNeuviemeArtSamedi);

        $dispoleNeuviemeArtDimanche = new RelationRestoJourDispo();
        $dispoleNeuviemeArtDimanche->setNomJour($this->getReference('dimanche'));
        $dispoleNeuviemeArtDimanche->setRestaurant($this->getReference('leNeuviemeArt'));
        $dispoleNeuviemeArtDimanche->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoleNeuviemeArtDimanche);

        // ******************  Dispo par jour pour le resto le Dauphinoix  ****************************************
        $dispoleDauphinoixLundi = new RelationRestoJourDispo();
        $dispoleDauphinoixLundi->setNomJour($this->getReference('lundi'));
        $dispoleDauphinoixLundi->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixLundi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleDauphinoixLundi);

        $dispoleDauphinoixMardi = new RelationRestoJourDispo();
        $dispoleDauphinoixMardi->setNomJour($this->getReference('mardi'));
        $dispoleDauphinoixMardi->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispoleDauphinoixMardi);

        $dispoleDauphinoixMercredi = new RelationRestoJourDispo();
        $dispoleDauphinoixMercredi->setNomJour($this->getReference('mercredi'));
        $dispoleDauphinoixMercredi->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleDauphinoixMercredi);

        $dispoleDauphinoixJeudi = new RelationRestoJourDispo();
        $dispoleDauphinoixJeudi->setNomJour($this->getReference('jeudi'));
        $dispoleDauphinoixJeudi->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleDauphinoixJeudi);

        $dispoleDauphinoixVendredi = new RelationRestoJourDispo();
        $dispoleDauphinoixVendredi->setNomJour($this->getReference('vendredi'));
        $dispoleDauphinoixVendredi->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleDauphinoixVendredi);

        $dispoleDauphinoixSamedi = new RelationRestoJourDispo();
        $dispoleDauphinoixSamedi->setNomJour($this->getReference('samedi'));
        $dispoleDauphinoixSamedi->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispoleDauphinoixSamedi);

        $dispoleDauphinoixDimanche = new RelationRestoJourDispo();
        $dispoleDauphinoixDimanche->setNomJour($this->getReference('dimanche'));
        $dispoleDauphinoixDimanche->setRestaurant($this->getReference('leDauphinoix'));
        $dispoleDauphinoixDimanche->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispoleDauphinoixDimanche);

        // ******************  Dispo par jour pour le resto la Petite Idee  ****************************************
        $dispolaPetiteIdeeLundi = new RelationRestoJourDispo();
        $dispolaPetiteIdeeLundi->setNomJour($this->getReference('lundi'));
        $dispolaPetiteIdeeLundi->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeLundi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolaPetiteIdeeLundi);

        $dispolaPetiteIdeeMardi = new RelationRestoJourDispo();
        $dispolaPetiteIdeeMardi->setNomJour($this->getReference('mardi'));
        $dispolaPetiteIdeeMardi->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispolaPetiteIdeeMardi);

        $dispolaPetiteIdeeMercredi = new RelationRestoJourDispo();
        $dispolaPetiteIdeeMercredi->setNomJour($this->getReference('mercredi'));
        $dispolaPetiteIdeeMercredi->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolaPetiteIdeeMercredi);

        $dispolaPetiteIdeeJeudi = new RelationRestoJourDispo();
        $dispolaPetiteIdeeJeudi->setNomJour($this->getReference('jeudi'));
        $dispolaPetiteIdeeJeudi->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolaPetiteIdeeJeudi);

        $dispolaPetiteIdeeVendredi = new RelationRestoJourDispo();
        $dispolaPetiteIdeeVendredi->setNomJour($this->getReference('vendredi'));
        $dispolaPetiteIdeeVendredi->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolaPetiteIdeeVendredi);

        $dispolaPetiteIdeeSamedi = new RelationRestoJourDispo();
        $dispolaPetiteIdeeSamedi->setNomJour($this->getReference('samedi'));
        $dispolaPetiteIdeeSamedi->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolaPetiteIdeeSamedi);

        $dispolaPetiteIdeeDimanche = new RelationRestoJourDispo();
        $dispolaPetiteIdeeDimanche->setNomJour($this->getReference('dimanche'));
        $dispolaPetiteIdeeDimanche->setRestaurant($this->getReference('laPetiteIdee'));
        $dispolaPetiteIdeeDimanche->setDispoOuverture($this->getReference('onlyLunchDispo'));
        $manager->persist($dispolaPetiteIdeeDimanche);

        // ******************  Dispo par jour pour le resto l'Hambourgeois'  ****************************************
        $dispolHambourgeoisLundi = new RelationRestoJourDispo();
        $dispolHambourgeoisLundi->setNomJour($this->getReference('lundi'));
        $dispolHambourgeoisLundi->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisLundi->setDispoOuverture($this->getReference('anyDispo'));
        $manager->persist($dispolHambourgeoisLundi);

        $dispolHambourgeoisMardi = new RelationRestoJourDispo();
        $dispolHambourgeoisMardi->setNomJour($this->getReference('mardi'));
        $dispolHambourgeoisMardi->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisMardi->setDispoOuverture($this->getReference('onlyDinerDispo'));
        $manager->persist($dispolHambourgeoisMardi);

        $dispolHambourgeoisMercredi = new RelationRestoJourDispo();
        $dispolHambourgeoisMercredi->setNomJour($this->getReference('mercredi'));
        $dispolHambourgeoisMercredi->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisMercredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolHambourgeoisMercredi);

        $dispolHambourgeoisJeudi = new RelationRestoJourDispo();
        $dispolHambourgeoisJeudi->setNomJour($this->getReference('jeudi'));
        $dispolHambourgeoisJeudi->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisJeudi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolHambourgeoisJeudi);

        $dispolHambourgeoisVendredi = new RelationRestoJourDispo();
        $dispolHambourgeoisVendredi->setNomJour($this->getReference('vendredi'));
        $dispolHambourgeoisVendredi->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisVendredi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolHambourgeoisVendredi);

        $dispolHambourgeoisSamedi = new RelationRestoJourDispo();
        $dispolHambourgeoisSamedi->setNomJour($this->getReference('samedi'));
        $dispolHambourgeoisSamedi->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisSamedi->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolHambourgeoisSamedi);

        $dispolHambourgeoisDimanche = new RelationRestoJourDispo();
        $dispolHambourgeoisDimanche->setNomJour($this->getReference('dimanche'));
        $dispolHambourgeoisDimanche->setRestaurant($this->getReference('lHambourgeois'));
        $dispolHambourgeoisDimanche->setDispoOuverture($this->getReference('fullDispo'));
        $manager->persist($dispolHambourgeoisDimanche);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EtablissementFixtures::class,
            JourSemaineFixtures::class,
            DispoOuverturesFixtures::class,
        ];
    }
}
