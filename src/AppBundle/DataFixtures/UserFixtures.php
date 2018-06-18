<?php
namespace AppBundle\DataFixtures;

use User\UserBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;  

class UserFixtures extends Fixture implements ORMFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        //Fixtures utilisateurs
        $array1 = ['Weblitzer', 'Kayelune', 'Chloe', 'Damien', 'Emerson'];
        $array2 = ['antoine.quidel@gmail.com', 'duclosxkevin@hotmail.fr', 'chloe.rault@orange.fr', 'damien.gibert76@gmail.com', 'Emerson.dujardin@hotmail.fr'];

        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setUsername($array1[$i]);
            $user->setEmail($array2[$i]);
            $user->setPlainPassword('123456');
            $user->setEnabled(1);
            $user->addRole('ROLE_ADMIN');
            $user->setCreatedAt(new \Datetime());
            
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}