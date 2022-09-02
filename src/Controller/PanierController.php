<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface as Session;


 /**
 * @Route("/panier")
 */   

class PanierController extends AbstractController
{
    #[Route('/', name: 'app_panier')]
    public function index(Session $session): Response
    {
        $panier = $session->get("panier",[]);
        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }    
    
    /**
     * @Route("/ajouter-produit-{id}", name="app_panier_ajouter", requirements={"id"="\d+"})
     */
    public function ajouter($id,ProduitRepository $pr, Session $session, Request $rq): Response
    {
        $quantite = $rq->query->get("qte", 1);
        $produit = $pr->find($id);
        $panier = $session->get("panier",[]);
        $panier[] = ['quantite' => $quantite, "produit" => $produit];        
        $session->set("panier",[$produit]);
        // dd($produit); // dd = (D)ump and (D)ie
        return $this->redirectToRoute("app_home");
    }
}
