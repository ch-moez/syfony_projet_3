<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     * @Route("/", name="produits")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $prod = $repo->findall();
        
        return $this->render('produits/index.html.twig', [
            'prod' => $prod,
        ]);
    }


    /**
     * @Route("/detailProduit/{id}", name="detailProduit")
     */
    public function detailProduit($id)
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $prod = $repo->find($id);
        //$prod="";
        return $this->render('produits/detailProduid.html.twig',[
            'p' => $prod,
        ]);
    }

}
