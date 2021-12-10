<?php

namespace App\Controller;

use App\Entity\RelationRestoJourDispo;
use App\Entity\Reservation;
use App\Entity\TypeCuisine;
use App\Form\ReservationType;
use App\Repository\EtablissementRepository;
use App\Repository\EtatReservationRepository;
use App\Repository\JourSemaineRepository;
use App\Repository\RelationRestoJourDispoRepository;
use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(EtablissementRepository $etablissementRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $allTypeCuisine = $this->getDoctrine()->getRepository(TypeCuisine::class)->findAll();
        $nom = (empty($request->get('nom')) ? '' : $request->get('nom'));
        $cp = (empty($request->get('cp')) ? '' : $request->get('cp'));
        $typeCusine = $request->get('typeCuisine');
        if (empty($nom) && empty($cp) && empty($typeCusine)){
            $restos = $etablissementRepository->findAll();
        }else {
            if (empty($typeCusine)){
                $restos = $etablissementRepository->getRestoWhitoutTypeCuisine($nom,$cp);
            }else{
                $dbTypeCuisine = $this->getDoctrine()->getRepository(TypeCuisine::class)->findOneBy(['nom'=>$typeCusine]);
                $restos = $etablissementRepository->getRestoWithTypeCuisine($nom, $cp, $dbTypeCuisine->getId());
            }
        }

        $pagination = $paginator->paginate(
            $restos,
            $request->query->getInt('page', 1),
            6
        );
        if ($request->isXmlHttpRequest()){
            return $this->render('main/layout/_ajax_display_card.html.twig', [
                'pagination' => $pagination,
                'restos'=>$restos,
                'allTypeCuisine'=>$allTypeCuisine
            ]);
        }
        return $this->render('main/index.html.twig', [
            'pagination' => $pagination,
            'restos'=>$restos,
            'allTypeCuisine'=>$allTypeCuisine
        ]);
    }

    /**
     * @Route("/set-language/{lang}", name="setLangueActive")
     */
    public function setLanguage($lang, Request $request): Response
    {
        $request->setLocale($lang);

        $referer = $request->headers->get('referer');
        $host = $request->headers->get('host');
        $routeToRedirect = explode($host,$referer);
        if ($lang === 'en'){
            return $this->redirect($routeToRedirect[0].$host.'/en'.$routeToRedirect[1]);
        } else {
            if (str_contains($routeToRedirect[1],'/en/')){
                $routeWithoutCountry = explode('/en/',$routeToRedirect[1]);
                return $this->redirect($routeToRedirect[0].$host.'/'.$routeWithoutCountry[1]);
            }
            return $this->redirect('/');
        }
    }
    
    /**
     * @Route("/mentions-legales", name="mentions-legales")
     */
    public function mentionsLegales()
    {
        // Nous générons la vue de la page des mentions légales
        return $this->render('main/mentions-legales.html.twig');
    }


    /**
     * @Route("/reservations/{id}", name="reservations")
     */
    public function reservations($id, EtablissementRepository $etablissementRepository, EtatReservationRepository $etatReservationRepository, Request $request)
    {
        $allTypeCuisine = $this->getDoctrine()->getRepository(TypeCuisine::class)->findAll();
        $resto = $etablissementRepository->find($id);
        $form = $this->createForm(ReservationType::class, new Reservation($resto));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

           $reservation = $form->getData();
           $etatReservation = $etatReservationRepository->findOneBy(['libelle'=>'en attente']);
           $reservation->setIdEtatReservation($etatReservation);
           $em = $this->getDoctrine()->getManager();
           $em->persist($reservation);
           $em->flush();
           $this->addFlash('success', 'Félicitation Mr/Mme '.$reservation->getNom().' votre réservation a 
           bien été envoyé, Vous recevrez dans les plus brefs délais un sms de confirmation');
        }
        // Nous générons la vue de la page des réservations
        return $this->render('main/reservation.html.twig',[
            'resto'=> $resto,
            'form' => $form->createView(),
            'allTypeCuisine'=>$allTypeCuisine
        ]);
    }

    /**
     * @Route("/reservations/getDispoDate/{name}", name="getDispoDateByResto")
     */
    public function getDispoDateByResto($name, EtablissementRepository $etablissementRepository)
    {
        $resto = $etablissementRepository->findOneBy(['nom'=>$name]);
        $ArrayDayWhereNotOpen = [];
        foreach ($resto->getRelationRestoJourDispos() as $dispo) {
            if (!$dispo->getDispoOuverture()->getServiceSoir() && !$dispo->getDispoOuverture()->getServiceSoir()){
                if ($dispo->getNomJour() == 'lundi'){
                    $numDay = 1;
                } elseif ($dispo->getNomJour() == 'mardi'){
                    $numDay = 2;
                } elseif ( $dispo->getNomJour() == 'mercredi'){
                    $numDay = 3;
                } elseif ( $dispo->getNomJour() == 'jeudi'){
                    $numDay = 4;
                } elseif ( $dispo->getNomJour() == 'vendredi'){
                    $numDay = 5;
                } elseif ( $dispo->getNomJour() == 'samedi'){
                    $numDay = 6;
                } else {
                    $numDay = 0;
                }
                array_push($ArrayDayWhereNotOpen, $numDay);
            }
        }
        $dayWhereNotOpen = implode(',', $ArrayDayWhereNotOpen);
        // Nous générons la vue de la page des réservations
        return new Response($dayWhereNotOpen);
    }

    /**
     * @Route("/reservations/getHourOpen/{nameResto}/{numJour}", name="getDispoHourOpen")
     */
    public function getHourDispoForDeliveryByDay($nameResto,$numJour, EtablissementRepository $etablissementRepository,
                                                 JourSemaineRepository $jourSemaineRepository,
                                                 RelationRestoJourDispoRepository $relationRestoJourDispoRepository)
    {
        $jour = '';
        if($numJour == 0){
            $jour = 'dimanche';
        } elseif ($numJour == 1){
            $jour = 'lundi';
        } elseif ($numJour == 2){
            $jour = 'mardi';
        } elseif ($numJour == 3){
            $jour = 'mercredi';
        } elseif ($numJour == 4){
            $jour = 'jeudi';
        } elseif ($numJour == 5){
            $jour = 'vendredi';
        } elseif ($numJour == 6){
            $jour = 'samedi';
        }
        $entityJour = $jourSemaineRepository->findOneBy(['nom'=>$jour]);
        $resto = $etablissementRepository->findOneBy(['nom'=>$nameResto]);
        $relationRestoJourDispo = $relationRestoJourDispoRepository->findOneBy(['restaurant'=>$resto->getId(), 'nomJour'=>$entityJour->getId()]);
        $arrayHourToDisplay = [];
        if ($relationRestoJourDispo instanceof RelationRestoJourDispo){
            if($relationRestoJourDispo->getDispoOuverture()->getServiceMidi()){
                $timeBegin = $relationRestoJourDispo->getRestaurant()->getServiceMidiDebutTime();
                $timeEnd = $relationRestoJourDispo->getRestaurant()->getServiceMidiFinTime();

                while ($timeBegin < $timeEnd){
                    $arrayHourToDisplay[$timeBegin->format("H:i")] = $timeBegin->format("H:i");
                    $timeBegin->add(new \DateInterval('PT30M'));
                }

            }
            if ($relationRestoJourDispo->getDispoOuverture()->getServiceSoir()){
                $timeBegin = $relationRestoJourDispo->getRestaurant()->getServiceSoirDebutTime();
                $timeEnd = $relationRestoJourDispo->getRestaurant()->getServiceSoirFinTime();

                while ($timeBegin < $timeEnd){
                    $arrayHourToDisplay[$timeBegin->format("H:i")] = $timeBegin->format("H:i");
                    $timeBegin->add(new \DateInterval('PT30M'));
                }

            }
        }

        return new JsonResponse($arrayHourToDisplay);
    }


}