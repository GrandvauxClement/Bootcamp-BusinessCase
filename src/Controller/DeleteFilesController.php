<?php

namespace App\Controller;

use App\Entity\ImagesRestaurants;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteFilesController extends AbstractController
{
    /**
     * @Route("/delete/files/{id}", name="delete_files")
     */
    public function deleteFiles(ImagesRestaurants $imagesRestaurants, Request $request, EntityManagerInterface $em): Response
    {
        unlink($this->getParameter('images_restaurant').'/'.$imagesRestaurants->getIdEtablissement()->getSlugFolderImage().'/'.$imagesRestaurants->getUrl());
        $em->remove($imagesRestaurants);
        $em->flush();
        $uri = $request->headers->get('referer');
      //  http%3A%2F%2F127.0.0.1%3A8000%2F
        return $this->redirect($uri);
    }
}
