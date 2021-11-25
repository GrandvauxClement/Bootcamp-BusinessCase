<?php

namespace App\Controller\Admin;

use App\Entity\Etablissement;
use App\Entity\ImagesRestaurants;
use App\Entity\RelationRestoJourDispo;
use App\Entity\Tags;
use App\Entity\TypeCuisine;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
      //  return parent::index();
        $restos = $this->getDoctrine()->getRepository(Etablissement::class)->count([]);
       return $this->render('backoffice/dashboard-accueil.html.twig', [
           "restos"=>$restos
       ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<div class="d-flex align-items-center justify-content-around"> <img src="images/logo/logo.png" class="img-fluid" style="max-height: 50px"><span class="text-danger mt-1">Dashboard</span></div>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Gestion des restaurants');
        yield MenuItem::linkToCrud('Les Restaurants', 'fas fa-list', Etablissement::class);
        yield MenuItem::linkToCrud('Les Types de cuisines', 'fas fa-utensils', TypeCuisine::class);
        yield MenuItem::linkToCrud('Les images de Resto', 'fas fa-images', ImagesRestaurants::class);
        yield MenuItem::linkToCrud('Les Tags', 'fas fa-tags', Tags::class);
//        yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
