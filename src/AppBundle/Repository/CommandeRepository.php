<?php

namespace AppBundle\Repository;

/**
 * CommandeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandeRepository extends \Doctrine\ORM\EntityRepository
{

//Requete pour compter le nombre de commandes dans la base de données
    public function countAllCommande()
    {

        return $this->createQueryBuilder('commande')->select('count(commande.id)')
        

                ->getQuery()->getSingleScalarResult();
       
    }

    
}
