<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;  

class AppFixtures extends Fixture implements ORMFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        // create 20 produits! Bam!
        for ($i = 0; $i < 20; $i++) {
            $produit = new Produit();
            $produit->setTitre('produit '.$i);
            $produit->setPrix(mt_rand(10, 100));
            $produit->setPoids(mt_rand(10, 100));
            $produit->setTag('tag '.$i);
            
            $manager->persist($produit);
        }

        $manager->flush();
    }
}