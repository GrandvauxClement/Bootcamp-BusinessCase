<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $restos = [
        [
            'name' => 'Bougnat Burger',
            'slug' => 'bougnat_burger',
            'adresse' => '42 boulevard cote blatin 95000 Paris',
            'telephone' => '06.65.68.62.64',
            'prix' => '€€',
            'image' => 'https://media-cdn.tripadvisor.com/media/photo-p/11/d0/0d/bd/bougnat-burger.jpg',
            'tags' => [
                'Burgers',
            ]
        ],
        [
            'name' => 'Pataterie',
            'slug' => 'pataterie',
            'adresse' => '118 boulevard cote blatin 69000 Lyon',
            'telephone' => '06.64.62.65.68',
            'prix' => '€€€',
            'image' => 'https://mvistatic.com/photosmvi/2021/09/08/P28031610D4812296G.jpg',
            'tags' => [
                'Micro-onde', 'Patates', 'Fromage',
            ]
        ]
    ];
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
     * @Route("/reservations", name="reservations")
     */
    public function reservations()
    {
        $resto =[
            'name' => 'Pataterie',
            'slug' => 'pataterie',
            'adresse' => '118 boulevard cote blatin 69000 Lyon',
            'telephone' => '06.64.62.65.68',
            'prix' => '€€€',
            'image' => 'https://mvistatic.com/photosmvi/2021/09/08/P28031610D4812296G.jpg',
            'tags' => [
                'Micro-onde', 'Patates', 'Fromage',
            ]
        ];
        // Nous générons la vue de la page des réservations
        return $this->render('main/reservation.html.twig',[
            'resto'=> $resto
        ]);
    }

}
