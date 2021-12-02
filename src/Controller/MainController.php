<?php

namespace App\Controller;

use App\Entity\Etablissement;
use App\Repository\ArticleRepository;
use App\Repository\EtablissementRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="accueil")
     */
    public function index(EtablissementRepository $etablissementRepository, PaginatorInterface $paginator, Request $request): Response
    {

        $restos = $etablissementRepository->findAll();
        $pagination = $paginator->paginate(
            $restos,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('main/index.html.twig', [
            'pagination' => $pagination,
            'restos'=>$restos
        ]);
    }
    /**
     * @Route("/search", name="search", methods={"GET"})
     */
    public function searchengine(Request $request, EtablissementRepository  $etablissementRepository): Response
    {

        $terms = $request->get('terms') ?? '';
        $restos = $etablissementRepository->search($terms);
        return new JsonResponse($restos);

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
