<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Fields\MultipleImageField;
use App\Entity\DispoOuverture;
use App\Entity\Etablissement;
use App\Entity\ImagesRestaurants;
use App\Entity\JourSemaine;
use App\Entity\RelationRestoJourDispo;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;

class EtablissementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etablissement::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX,'detail');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setFormThemes(['backoffice/display-image-edit.html.twig', '@EasyAdmin/crud/form_theme.html.twig']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'Id')->onlyOnIndex(),
            FormField::addPanel('Informations générales'),
            TextField::new('nom', 'Nom'),
            TextEditorField::new('description', 'Description')->hideOnIndex(),
            IntegerField::new('num_rue','Numéro de la rue')->hideOnIndex(),
            TextField::new('rue', 'Nom de la rue')->hideOnIndex(),
            TextField::new('code_postal', 'Code Postal')->hideOnIndex(),
            TextField::new('ville','Ville'),
            TelephoneField::new('numTelephone','Numéro de télephone'),
            FormField::addPanel('Capacité d\'accueil et type de cuisine'),
            IntegerField::new('nbre_place_total','Nombre de couvert total'),
            BooleanField::new('accepte_reservation','Accepte les réservations'),
            TimeField::new('service_midi_debut_time','Heure de début du service du midi')->hideOnIndex(),
            TimeField::new('service_midi_fin_time','Heure de fin du service du midi')->hideOnIndex(),
            TimeField::new('service_soir_debut_time','Heure de début du service du soir')->hideOnIndex(),
            TimeField::new('service_soir_fin_time','Heure de fin du service du soir')->hideOnIndex(),
            AssociationField::new('id_type_cuisine','Type de cuisine'),
            AssociationField::new('tags','Les différents tags')->hideOnIndex(),
            NumberField::new('note','Notation du resto'),
            FormField::addPanel('Telechargement d\'image de présentation et du menu'),
            ImageField::new('slug_menu', 'Telecharger votre menu')
                ->setBasePath('restaurants/')
                ->setUploadDir('public/images/restaurants')
                ->setFormType(FileUploadType::class)
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->hideOnIndex(),
            CollectionField::new('imagesRestaurants', 'Images Actuelles')
                ->setFormTypeOptions([
                    'block_name'=>'custom_display_image',
                ])
                ->onlyWhenUpdating(),
            MultipleImageField::new('imageFile', 'Ajouter des images de présentation')
                ->setRequired(false)
                ->onlyOnForms(),

            FormField::addPanel('Choix de vos disponibilités par jour '),
            ChoiceField::new('dispoLundi', 'Choisissez votre disponibilité du lundi')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),
            ChoiceField::new('dispoMardi', 'Choisissez votre disponibilité du mardi')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),

            ChoiceField::new('dispoMercredi', 'Choisissez votre disponibilité du mercredi')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),
            ChoiceField::new('dispoJeudi', 'Choisissez votre disponibilité du jeudi')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),
            ChoiceField::new('dispoVendredi', 'Choisissez votre disponibilité du vendredi')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),
            ChoiceField::new('dispoSamedi', 'Choisissez votre disponibilité du samedi')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),
            ChoiceField::new('dispoDimanche', 'Choisissez votre disponibilité du dimanche')
                ->renderExpanded(true)
                ->allowMultipleChoices(true)
                ->onlyOnForms()
                ->setChoices(
                    [
                        'Service du midi'=>'midi',
                        'Service du soir'=>'soir',
                    ]),
        ];
    }


    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {

        if ($entityInstance instanceof Etablissement){

        $resto = new Etablissement();
        $resto->setNom($entityInstance->getNom());
        $resto->setNumRue($entityInstance->getNumRue());
        $resto->setRue($entityInstance->getRue());
        $resto->setVille($entityInstance->getVille());
        $resto->setCodePostal($entityInstance->getCodePostal());
        $resto->setAccepteReservation($entityInstance->getAccepteReservation());
        $resto->setDescription($entityInstance->getDescription());
        $resto->setNote($entityInstance->getNote());
        $resto->setNbrePlaceTotal($entityInstance->getNbrePlaceTotal());
        $resto->setServiceMidiDebutTime($entityInstance->getServiceMidiDebutTime());
        $resto->setServiceMidiFinTime($entityInstance->getServiceMidiFinTime());
        $resto->setServiceSoirDebutTime($entityInstance->getServiceSoirDebutTime());
        $resto->setServiceSoirFinTime($entityInstance->getServiceSoirFinTime());
        $resto->setIdTypeCuisine($entityInstance->getIdTypeCuisine());
        foreach ($entityInstance->getTags() as $tag){
            $resto->addTag($tag);
        }

        $resto->setNumTelephone($entityInstance->getNumTelephone());
        $resto->setSlugMenu($entityInstance->getSlugMenu());

        if (!file_exists($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage().'\\'.$entityInstance->getSlugMenu())){
            if (!is_dir($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage())){
                mkdir($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage());
            }
            rename($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugMenu(), $this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage().'\\'.$entityInstance->getSlugMenu());
        }

            $entityManager->persist($resto);
        // J'ajoute les images

        foreach ($entityInstance->getImageFile() as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $newFileName = uniqid().''.$imageUrl->getClientOriginalName();
            $imageUrl->move('images/restaurants/'.$resto->getSlugFolderImage(), $newFileName);
            $imageForBdd->setUrl( $newFileName);
            $imageForBdd->setIdEtablissement($resto);
            $entityManager->persist($imageForBdd);
        }


            // J'ajout les disponnibiltés d'ouverture
            //Pour ça je recup d'abord mes 4 dispo possible
            $fullService = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>true, 'service_soir'=>true]);
            $anyService = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>false, 'service_soir'=>false]);
            $onlyLunch = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>true, 'service_soir'=>false]);
            $onlyDinner = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>false, 'service_soir'=>true]);
            // Puis je récup également mes 7 jours de la semaine
            $lundi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'lundi']);
            $mardi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'mardi']);
            $mercredi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'mercredi']);
            $jeudi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'jeudi']);
            $vendredi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'vendredi']);
            $samedi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'samedi']);
            $dimanche = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'dimanche']);

            // Je peux maintenant ajouté mes dispo

            $dispoLundi = new RelationRestoJourDispo();
            $dispoLundi->setNomJour($lundi);
            $dispoLundi->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoLundi(), true)  && in_array('soir', $entityInstance->getDispoLundi(), true)){
                $dispoLundi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoLundi(), true)   && in_array('soir', $entityInstance->getDispoLundi(), true)) {
                $dispoLundi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoLundi(), true) && !in_array('soir', $entityInstance->getDispoLundi(), true) ) {
                $dispoLundi->setDispoOuverture($onlyLunch);
            } else {
                $dispoLundi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoLundi);

            $dispoMardi = new RelationRestoJourDispo();
            $dispoMardi->setNomJour($mardi);
            $dispoMardi->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoMardi(), true)  && in_array('soir', $entityInstance->getDispoMardi(), true)){
                $dispoMardi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoMardi(), true)   && in_array('soir', $entityInstance->getDispoMardi(), true)) {
                $dispoMardi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoMardi(), true) && !in_array('soir', $entityInstance->getDispoMardi(), true) ) {
                $dispoMardi->setDispoOuverture($onlyLunch);
            } else {
                $dispoMardi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoMardi);

            $dispoMercredi = new RelationRestoJourDispo();
            $dispoMercredi->setNomJour($mercredi);
            $dispoMercredi->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoMercredi(), true)  && in_array('soir', $entityInstance->getDispoMercredi(), true)){
                $dispoMercredi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoMercredi(), true)   && in_array('soir', $entityInstance->getDispoMercredi(), true)) {
                $dispoMercredi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoMercredi(), true) && !in_array('soir', $entityInstance->getDispoMercredi(), true) ) {
                $dispoMercredi->setDispoOuverture($onlyLunch);
            } else {
                $dispoMercredi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoMercredi);

            $dispoJeudi = new RelationRestoJourDispo();
            $dispoJeudi->setNomJour($jeudi);
            $dispoJeudi->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoJeudi(), true)  && in_array('soir', $entityInstance->getDispoJeudi(), true)){
                $dispoJeudi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoJeudi(), true)   && in_array('soir', $entityInstance->getDispoJeudi(), true)) {
                $dispoJeudi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoJeudi(), true) && !in_array('soir', $entityInstance->getDispoJeudi(), true) ) {
                $dispoJeudi->setDispoOuverture($onlyLunch);
            } else {
                $dispoJeudi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoJeudi);

            $dispoVendredi = new RelationRestoJourDispo();
            $dispoVendredi->setNomJour($vendredi);
            $dispoVendredi->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoVendredi(), true)  && in_array('soir', $entityInstance->getDispoVendredi(), true)){
                $dispoVendredi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoVendredi(), true)   && in_array('soir', $entityInstance->getDispoVendredi(), true)) {
                $dispoVendredi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoVendredi(), true) && !in_array('soir', $entityInstance->getDispoVendredi(), true) ) {
                $dispoVendredi->setDispoOuverture($onlyLunch);
            } else {
                $dispoVendredi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoVendredi);

            $dispoSamedi = new RelationRestoJourDispo();
            $dispoSamedi->setNomJour($samedi);
            $dispoSamedi->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoSamedi(), true)  && in_array('soir', $entityInstance->getDispoSamedi(), true)){
                $dispoSamedi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoSamedi(), true)   && in_array('soir', $entityInstance->getDispoSamedi(), true)) {
                $dispoSamedi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoSamedi(), true) && !in_array('soir', $entityInstance->getDispoSamedi(), true) ) {
                $dispoSamedi->setDispoOuverture($onlyLunch);
            } else {
                $dispoSamedi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoSamedi);

            $dispoDimanche = new RelationRestoJourDispo();
            $dispoDimanche->setNomJour($dimanche);
            $dispoDimanche->setRestaurant($resto);
            if (in_array('midi', $entityInstance->getDispoDimanche(), true)  && in_array('soir', $entityInstance->getDispoDimanche(), true)){
                $dispoDimanche->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoDimanche(), true)   && in_array('soir', $entityInstance->getDispoDimanche(), true)) {
                $dispoDimanche->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoDimanche(), true) && !in_array('soir', $entityInstance->getDispoDimanche(), true) ) {
                $dispoDimanche->setDispoOuverture($onlyLunch);
            } else {
                $dispoDimanche->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoDimanche);
        $entityManager->flush();
        }
    }


    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Etablissement){

//            if (!file_exists($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage().'\\'.$entityInstance->getSlugMenu())){
//                if (!is_dir($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage())){
//                    mkdir($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage());
//                }
//                rename($this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugMenu(), $this->getParameter('kernel.project_dir').'\\public\\images\\restaurants\\'.$entityInstance->getSlugFolderImage().'\\'.$entityInstance->getSlugMenu());
//            }

            if (empty($entityInstance->getSlugMenu())){
                $entityInstance->setSlugMenu($entityInstance->getOldSlugMenu());
            }

            // J'ajoute les images
            foreach ($entityInstance->getOldImageFile() as $oldImageUrl){
                $imageForBdd = new ImagesRestaurants();
                $imageForBdd->setUrl($oldImageUrl);
                $imageForBdd->setIdEtablissement($entityInstance);
                $entityManager->persist($imageForBdd);
            }
            $entityManager->persist($entityInstance);

            foreach ($entityInstance->getImageFile() as $imageUrl){
                $imageForBdd = new ImagesRestaurants();
                $newFileName = uniqid().''.$imageUrl->getClientOriginalName();
                $imageUrl->move('images/restaurants/'.$entityInstance->getSlugFolderImage(), $newFileName);
                $imageForBdd->setUrl( $newFileName);
                $imageForBdd->setIdEtablissement($entityInstance);
                $entityManager->persist($imageForBdd);
            }


            // J'ajout les disponnibiltés d'ouverture
            //Pour ça je recup d'abord mes 4 dispo possible
            $fullService = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>true, 'service_soir'=>true]);
            $anyService = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>false, 'service_soir'=>false]);
            $onlyLunch = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>true, 'service_soir'=>false]);
            $onlyDinner = $this->getDoctrine()->getRepository(DispoOuverture::class)->findOneBy(['service_midi'=>false, 'service_soir'=>true]);
            // Puis je récup également mes 7 jours de la semaine
            $lundi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'lundi']);
            $mardi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'mardi']);
            $mercredi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'mercredi']);
            $jeudi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'jeudi']);
            $vendredi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'vendredi']);
            $samedi = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'samedi']);
            $dimanche = $this->getDoctrine()->getRepository(JourSemaine::class)->findOneBy(['nom'=>'dimanche']);

            // Je peux maintenant ajouté mes dispo

            $dispoLundi = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$lundi->getId()]);
            if (in_array('midi', $entityInstance->getDispoLundi(), true)  && in_array('soir', $entityInstance->getDispoLundi(), true)){
                $dispoLundi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoLundi(), true)   && in_array('soir', $entityInstance->getDispoLundi(), true)) {
                $dispoLundi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoLundi(), true) && !in_array('soir', $entityInstance->getDispoLundi(), true) ) {
                $dispoLundi->setDispoOuverture($onlyLunch);
            } else {
                $dispoLundi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoLundi);

            $dispoMardi = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$mardi->getId()]);

            if (in_array('midi', $entityInstance->getDispoMardi(), true)  && in_array('soir', $entityInstance->getDispoMardi(), true)){
                $dispoMardi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoMardi(), true)   && in_array('soir', $entityInstance->getDispoMardi(), true)) {
                $dispoMardi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoMardi(), true) && !in_array('soir', $entityInstance->getDispoMardi(), true) ) {
                $dispoMardi->setDispoOuverture($onlyLunch);
            } else {
                $dispoMardi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoMardi);

            $dispoMercredi = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$mercredi->getId()]);
            if (in_array('midi', $entityInstance->getDispoMercredi(), true)  && in_array('soir', $entityInstance->getDispoMercredi(), true)){
                $dispoMercredi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoMercredi(), true)   && in_array('soir', $entityInstance->getDispoMercredi(), true)) {
                $dispoMercredi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoMercredi(), true) && !in_array('soir', $entityInstance->getDispoMercredi(), true) ) {
                $dispoMercredi->setDispoOuverture($onlyLunch);
            } else {
                $dispoMercredi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoMercredi);

            $dispoJeudi = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$jeudi->getId()]);
            if (in_array('midi', $entityInstance->getDispoJeudi(), true)  && in_array('soir', $entityInstance->getDispoJeudi(), true)){
                $dispoJeudi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoJeudi(), true)   && in_array('soir', $entityInstance->getDispoJeudi(), true)) {
                $dispoJeudi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoJeudi(), true) && !in_array('soir', $entityInstance->getDispoJeudi(), true) ) {
                $dispoJeudi->setDispoOuverture($onlyLunch);
            } else {
                $dispoJeudi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoJeudi);

            $dispoVendredi = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$vendredi->getId()]);
            if (in_array('midi', $entityInstance->getDispoVendredi(), true)  && in_array('soir', $entityInstance->getDispoVendredi(), true)){
                $dispoVendredi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoVendredi(), true)   && in_array('soir', $entityInstance->getDispoVendredi(), true)) {
                $dispoVendredi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoVendredi(), true) && !in_array('soir', $entityInstance->getDispoVendredi(), true) ) {
                $dispoVendredi->setDispoOuverture($onlyLunch);
            } else {
                $dispoVendredi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoVendredi);

            $dispoSamedi = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$samedi->getId()]);
            if (in_array('midi', $entityInstance->getDispoSamedi(), true)  && in_array('soir', $entityInstance->getDispoSamedi(), true)){
                $dispoSamedi->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoSamedi(), true)   && in_array('soir', $entityInstance->getDispoSamedi(), true)) {
                $dispoSamedi->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoSamedi(), true) && !in_array('soir', $entityInstance->getDispoSamedi(), true) ) {
                $dispoSamedi->setDispoOuverture($onlyLunch);
            } else {
                $dispoSamedi->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoSamedi);

            $dispoDimanche = $this->getDoctrine()->getRepository(RelationRestoJourDispo::class)->findOneBy(['restaurant'=>$entityInstance->getId(),'nomJour'=>$dimanche->getId()]);
            if (in_array('midi', $entityInstance->getDispoDimanche(), true)  && in_array('soir', $entityInstance->getDispoDimanche(), true)){
                $dispoDimanche->setDispoOuverture($fullService);
            } elseif (!in_array('midi', $entityInstance->getDispoDimanche(), true)   && in_array('soir', $entityInstance->getDispoDimanche(), true)) {
                $dispoDimanche->setDispoOuverture($onlyDinner);
            } elseif (in_array('midi', $entityInstance->getDispoDimanche(), true) && !in_array('soir', $entityInstance->getDispoDimanche(), true) ) {
                $dispoDimanche->setDispoOuverture($onlyLunch);
            } else {
                $dispoDimanche->setDispoOuverture($anyService);
            }
            $entityManager->persist($dispoDimanche);
            $entityManager->flush();
        }
    }

    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        foreach ($entityInstance->getImagesRestaurants() as $imgResto){
            unlink($this->getParameter('images_restaurant').'/'.$entityInstance->getSlugFolderImage().'/'.$imgResto->getUrl());
        }
        unlink($this->getParameter('images_restaurant').'/'.$entityInstance->getSlugFolderImage().'/'.$entityInstance->getSlugMenu());
        rmdir($this->getParameter('images_restaurant').'/'.$entityInstance->getSlugFolderImage());
        $entityManager->remove($entityInstance);
        $entityManager->flush();
    }

}
