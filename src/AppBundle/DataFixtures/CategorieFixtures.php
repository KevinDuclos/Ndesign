<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;  

class CategorieFixtures extends Fixture implements ORMFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        // create 20 produits! Bam!
        for ($i = 0; $i < 20; $i++) {
            $categorie = new Categorie();
            $categorie->setCategory('New');
            
            
            $manager->persist($categorie);
        }

        $manager->flush();
    }
}