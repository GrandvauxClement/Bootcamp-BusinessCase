<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Fields\MultipleImageField;
use App\Entity\Etablissement;
use App\Entity\ImagesRestaurants;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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

class EtablissementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etablissement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'Id')->onlyOnIndex(),
            TextField::new('nom', 'Nom'),
            TextEditorField::new('description', 'Description')->hideOnIndex(),
            TextField::new('rue', 'Numéro et nom de rue')->hideOnIndex(),
            TextField::new('code_postal', 'Code Postal')->hideOnIndex(),
            TextField::new('ville','Ville'),
            IntegerField::new('nbre_place_total','Nombre de couvert total'),
            BooleanField::new('accepte_reservation','Accepte les réservations'),
            TimeField::new('service_midi_debut_time','Heure de début du service du midi')->hideOnIndex(),
            TimeField::new('service_midi_fin_time','Heure de fin du service du midi')->hideOnIndex(),
            TimeField::new('service_soir_debut_time','Heure de début du service du soir')->hideOnIndex(),
            TimeField::new('service_soir_fin_time','Heure de fin du service du soir')->hideOnIndex(),
            AssociationField::new('id_type_cuisine','Type de cuisine'),
            AssociationField::new('tags','Les différents tags')->hideOnIndex(),
            NumberField::new('note','Notation du resto'),
            TelephoneField::new('numTelephone','Numéro de télephone'),
            ImageField::new('slug_menu', 'Telecharger votre menu')
                ->setBasePath('restaurants/')
                ->setUploadDir('public/images/restaurants')
                ->setFormType(FileUploadType::class)
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->hideOnIndex(),

//            SlugField::new('slugFolderImage', 'Nom du dossier où les images sont dl'),
        //    ImageField::new('slug_menu', 'Nom du menu')
          //  AssociationField::new('dispoOuvertures', 'Definir vos périodes d\'ouverture')->hideOnIndex(),
            MultipleImageField::new('imageFile')
                ->setRequired(false)
                ->onlyOnForms(),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Etablissement){


        $resto = new Etablissement();
        $resto->setNom($entityInstance->getNom());
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
        // Les jour d'ouverture -> dispo
      /*  foreach ($entityInstance->getDispoOuvertures() as $jourDispo){
            $resto->addDispoOuverture($jourDispo);
        }*/

            $entityManager->persist($resto);
        // J'ajoute les images

        foreach ($entityInstance->getImageFile() as $imageUrl){
            $imageForBdd = new ImagesRestaurants();
            $imageUrl->move('images/restaurants/'.$resto->getSlugFolderImage(), uniqid().''.$imageUrl->getClientOriginalName());
            $imageForBdd->setUrl( uniqid().''.$imageUrl->getClientOriginalName());
            $imageForBdd->setIdEtablissement($resto);
            $entityManager->persist($imageForBdd);
        }
        $entityManager->flush();
        }
    }

}
