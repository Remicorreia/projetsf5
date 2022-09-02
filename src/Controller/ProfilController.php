<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil")
 */
class ProfilController extends AbstractController
{
    #[Route('/', name: 'app_profil')]
    public function index(): Response
    {
        /**
         * Pour recupere les information de l'utilisateur connecte dans le controleur
         *  $clients = $this->get_User
         * Mais on peut recupere l'utilisateur connecte directement dasn un fichier twig avec app User
         */
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    /**
    * @Route("liste")
    */
    #[Route('/liste', name: 'app_profil_liste')]
    public function liste(ProduitRepository $produitRepository): Response
    {
        return $this->render('profil/liste.html.twig', [
            'produits' => $produitRepository->findAll()
        ]);
    }

}
