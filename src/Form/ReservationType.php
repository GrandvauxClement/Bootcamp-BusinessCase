<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Repository\JourSemaineRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    private $jourSemaineRepository;
    public function __construct(JourSemaineRepository $jourSemaineRepository)
    {
        $this->jourSemaineRepository = $jourSemaineRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateReservation', DateType::class, [
                'widget' => 'single_text',
                'label'=>false,
                'html5' => false,
                'attr' => ['class' => 'js-datepicker bg-white text-black']
            ])
            ->add('stock_heure_arrive',ChoiceType::class,[
                'label'=>false,
                'choices' => [
                    '06:00'=>'06:00', '06:30'=>'06:30', '07:00'=>'07:00',
                    '07:30'=>'07:30', '08:00'=>'08:00', '08:30'=>'09:00',
                    '09:30'=>'09:30', '10:00'=>'10:00', '10:30'=>'10:30',
                    '11:00'=>'11:00', '11:30'=>'11:30', '12:00'=>'12:00',
                    '12:30'=>'12:30', '13:00'=>'13:00', '13:30'=>'13:30',
                    '14:00'=>'14:00', '14:30'=>'14:30', '15:00'=>'15:00',
                    '15:30'=>'15:30', '16:00'=>'16:00', '16:30'=>'16:30',
                    '17:00'=>'17:00', '17:30'=>'17:30', '18:00'=>'18:00',
                    '18:30'=>'18:30', '19:00'=>'19:00', '19:30'=>'19:30',
                    '20:00'=>'20:00', '20:30'=>'20:30', '21:00'=>'21:00',
                    '21:30'=>'21:30', '22:00'=>'22:00', '22:30'=>'22:30',
                    '23:00'=>'23:00', '23:30'=>'23:30', '00:00'=>'00:00',
                    '00:30'=>'00:30', '01:00'=>'01:00', '01:30'=>'01:30',
                    '02:00'=>'02:30', '03:00'=>'03:00'
                ]
            ])
            ->add('nbre_place', ChoiceType::class, [
                'choices'=> [
                    '1'=>'1','2'=>'2',
                    '3'=>'3','4'=>'4',
                    '5'=>'5', '6'=>'6',
                    '7'=>'7', '8'=>'8',
                    '9'=>'9', '10'=>'10',
                    '11'=>'11', '12'=>'12'
                ],
                'label'=>false
            ])
            ->add('nom', TextType::class, [
                'label'=>'static.formReservation.nom.label',
                'attr' => ['class' => 'bg-white text-black',
                    'placeholder'=>'static.formReservation.nom.placeholder']
            ])
            ->add('prenom', TextType::class, [
                'label'=>'static.formReservation.prenom.label',
                'attr' => ['class' => 'bg-white text-black','placeholder'=>'static.formReservation.prenom.placeholder']
            ])
            ->add('num_tel', TelType::class, [
                'label'=>'static.formReservation.numTel.label',
                'attr' => ['class' => 'bg-white text-black',
                    'placeholder'=>'static.formReservation.numTel.placeholder']
            ])
//            ->add('save', SubmitType::class, [
//
//            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'translation_domain' => 'messages'
        ]);
    }
}
