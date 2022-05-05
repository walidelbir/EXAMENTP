<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Framework\WebLinkConfig;

class AfficheController extends AbstractController
{
    #[Route('/affiche', name: 'app_affiche')]
    public function index(ManagerRegistry $doctrine,): Response
    {
    $repo = $doctrine->getRepository(Entreprise::class);
    $entreprises = $repo->findAll();
    $array = [];
        foreach ($entreprises as $entreprise) {

    }
        return $this->render('affiche/index.html.twig', [
            'controller_name' => 'AfficheController',
        ]);
    }
}
