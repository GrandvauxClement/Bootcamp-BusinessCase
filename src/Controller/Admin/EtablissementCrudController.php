<?php

namespace App\Controller\Admin;

use App\Entity\Etablissement;
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

        ];
    }

}
