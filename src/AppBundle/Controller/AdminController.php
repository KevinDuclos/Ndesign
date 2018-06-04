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
        $prod=$this->getDoctrine()->getManager();
       
        $prod = $prod->getRepository('AppBundle:Produit')->countAllProduit();
       
        $em=$this->getDoctrine()->getManager();
       
                $count = $em->getRepository('AppBundle:Commande')->countAllCommande();


                


               


                return $this ->render('@App/Default/dashboard.html.twig', ['prod' => $prod, 'count'=> $count]);



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
    
}
