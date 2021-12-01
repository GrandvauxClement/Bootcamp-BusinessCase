<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    private EtablissementRepository $etablissementRepository;

    public function __construct(EtablissementRepository $er){
        $this->etablissementRepository = $er;
}
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request, EtablissementRepository $etablissementRepository): Response
    {

        $form = $this->createForm(SearchType::class);

        $results = $etablissementRepository->findAll();

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $results = $this->etablissementRepository->search($form->getData());
        }
        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'results' => $results
        ]);
    }
}
