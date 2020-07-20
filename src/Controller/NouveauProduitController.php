<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Produit;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Controller\Admin\Crud;
use App\Entity\ForumCategory;
use App\Form\ForumCategoryType;
//use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ManagerRegistry;

use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Form\ProduitType;

class NouveauProduitController extends AbstractController
{
    /**
     * @Route("/nouveau/produit", name="nouveau_produit")
     */
    public function index(Request $req, ManagerRegistry  $manger)
    {
        $prod = new Produit();

  //      $form = $this->createFormBuilder($prod)
   //                  ->add('titre',textType::class)
   //                  ->add('description',textareaType::class)
   //                  ->add('prix')
   //                  ->add('img', TextareaType::class)
   //                  ->add('save',submitType::class)
  //                   ->getForm();

        $form = $this->createForm(ProduitType::class, $prod);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid() ){
            echo 'isSubmitted';
            dump($req);
            $em = $manger->getManager();
            //$manger->persist($prod);
            //$manger->flush();

            $em->persist($prod);
            $em->flush();

            return $this->redirectToRoute('produits');
        }

        return $this->render('nouveau_produit/index.html.twig', [
            'formProduit' => $form->createView(),
        ]);
    }
}
