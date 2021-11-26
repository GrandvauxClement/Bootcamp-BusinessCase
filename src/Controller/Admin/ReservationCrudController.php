<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('prenom', 'Saisir votre prenom'),
            TextField::new('nom', 'Saisir votre nom'),
            TelephoneField::new('num_tel', 'Votre numéro de téléphone'),
            TimeField::new('heure_arrive','Votre heure d\'arrive'),
            IntegerField::new('nbre_place', 'Le nombre de place réservé'),
            AssociationField::new('id_etablissement','L\'établissement concerné'),
            AssociationField::new('id_etat_reservation', 'L\'état de la réservation')
        ];
    }

}
