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
                


               


                return $this ->render('@App/Default/dashboard.html.twig', ['prod' => $prod, 'count'=> $count, 'users'=>$users] );



    }

    public function widgetsAction(){
        return $this->render('@App/Default/widgets.html.twig');
    }
    public function chartsAction(){
        return $this->render('@App/Default/charts.html.twig');
    }
    public function tablesAction(){
        return $this->render('@App/Default/tables.html.twig');
    }
    public function formsAction(){
        return $this->render('@App/Default/forms.html.twig');
    }
    public function panelsAction(){
        return $this->render('@App/Default/panels.html.twig');
    }
    public function iconsAction(){
        return $this->render('@App/Default/icons.html.twig');
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

            return $this->render('@App/Default/users.html.twig', [
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

            return $this->render('@App/Default/produit.html.twig', [
                'produits' => $produits
            ]);
        }

        
    }

    
    
}
