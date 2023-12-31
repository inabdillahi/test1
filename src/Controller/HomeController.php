<?php

namespace App\Controller;

use App\Repository\TableimageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(TableimageRepository $repo): Response
    {
        $images = $repo->findAll();
        return $this->render('home/index.html.twig', [
            'images' => $images
        ]);
    }
}
