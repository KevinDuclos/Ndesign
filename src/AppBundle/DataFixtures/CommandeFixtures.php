<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Commande;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;  

class CommandeFixtures extends Fixture implements ORMFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        // create 20 produits! Bam!
        for ($i = 0; $i < 20; $i++) {
            $commande = new Commande();
            $commande->setUser(null);
            $commande->setDate(new \DateTime());
            
            
            $manager->persist($commande);
        }

        $manager->flush();
    }
}