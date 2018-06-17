<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;  

class ProduitsFixtures extends Fixture implements ORMFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $array = ['WebPizza', 'Spatial', 'NeoWizz', 'SimpleBlog', 'S/Dark', 'Soledad', 'Lunatic', 'SolarTheme', 'Urban', 'Arctic', 'LaLaLand', 'Merging','Plurality', 'Nirvana', 'Libellule', 'Personal','Tyrande','LittleSite','Nibel','Ysandre'];
        // Fixtures des produits
        for ($i = 0; $i < 20; $i++) {
            $produit = new Produit();
            $produit->setTitre($array[$i]);
            $produit->setPrix(mt_rand(10, 100));
            $produit->setPoids(mt_rand(10, 100));
            $produit->setImageName('miniature.jpg');
            $produit->setImageSize(12);
            $produit->setImageFile(null);
            $manager->persist($produit);
        }

        $manager->flush();
    }
}