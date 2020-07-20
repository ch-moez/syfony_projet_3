<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;

class ProduitFextures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=1; $i<=10; $i++){
            $produit = new Produit();
            $produit->setTitre("Ptoduit n°$i")
                    ->setDescription("Description de produit n°$i")
                    ->setPrix(10.5*$i)
                    ->setImg("http://placehold.it/350x150");
            $manager->persist($produit);
            $manager->flush();
        }

        
    }
}
