<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Mig54Controller extends AbstractController
{
    #[Route('/mig54', name: 'app_mig54')]
    public function index(): Response
    {
        return $this->render('mig54/index.html.twig', [
            'controller_name' => 'Mig54Controller',
        ]);
    }
    #[Route('/mig54/affichage', name: 'aff_mig54')]
    public function affichage(): Response
    {
        return $this->render('mig54/affichage.html.twig', [
            'controller_name' => 'Mig54Controller',
        ]);
    }
}
