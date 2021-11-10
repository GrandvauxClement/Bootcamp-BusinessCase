<?php

namespace App\Controller;

use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(EtablissementRepository $etablissementRepository): Response
    {

        $restos = $etablissementRepository->findAll();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'restos'=>$restos
        ]);
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
    public function reservations($id, EtablissementRepository $etablissementRepository)
    {
        $resto = $etablissementRepository->find($id);

        // Nous générons la vue de la page des réservations
        return $this->render('main/reservation.html.twig',[
            'resto'=> $resto
        ]);
    }

}
