<?php

namespace App\Controller;

use App\Entity\Tableimage;
use App\Form\ImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $image = new Tableimage;
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($image);
            $manager->flush();
        }

        return $this->render('admin/admin.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
