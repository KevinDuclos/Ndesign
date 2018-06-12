<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Produit;

class AdminController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function dashboardAction(){
        $em=$this->getDoctrine()->getManager();
       
        $prod = $em->getRepository('AppBundle:Produit')->countAllProduit();
       
        $count = $em->getRepository('AppBundle:Commande')->countAllCommande();

        $users = $em->getRepository('UserBundle:User')->countAllUser();
                
        $temps = $em->getRepository('AppBundle:Produit')->getAllProduit();

               


                return $this ->render('@App/admin/dashboard.html.twig', ['prod' => $prod, 'count'=> $count, 'users'=>$users, 'temps'=>$temps] );



    }

   
    public function iconsAction(){
        return $this->render('@App/admin/icons.html.twig');
    }
    public function loginAction(){
    }

    // A mettre dans admin controller
    public function usersAction(){

        {
            $em = $this->getDoctrine()->getManager();
            $users = $em
                ->getRepository('UserBundle:User')
                ->findAll();

            return $this->render('@App/admin/users.html.twig', [
                'users' => $users
            ]);
        }

        
    }
    
    public function produitAction(){

        {
            $em = $this->getDoctrine()->getManager();
            $produits = $em
                ->getRepository('AppBundle:Produit')
                ->findAll();

            return $this->render('@App/admin/produit.html.twig', [
                'produits' => $produits
            ]);
        }

        
    }

    public function commandeAction(){
        {
            $em = $this->getDoctrine()->getManager();
            $commandes = $em
                ->getRepository('AppBundle:Commande')
                ->findAll();

            return $this->render('@App/admin/commandes.html.twig', [
                'commandes' => $commandes
            ]);
        }

    }

    public function contactAction(){
        {
            $em = $this->getDoctrine()->getManager();
            $contacts = $em
                ->getRepository('AppBundle:Contact')
                ->findAll();

            return $this->render('@App/admin/contact_admin.html.twig', [
                'contacts' => $contacts
            ]);
        }

    }

    
    
}
