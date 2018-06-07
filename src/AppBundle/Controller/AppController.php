<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
    
            $em = $this->getDoctrine()->getManager();
            $commandes = $em
                ->getRepository('AppBundle:Commande')
                ->getAllCommandeJoinwithProduct();
            
            return $this->render('@App/App/index.html.twig', [
                'commandes' => $commandes,
                'user' => $this->getUser()
                
            ]);
    }
    public function contactAction()
    {
        return $this->render('@App/App/contact.html.twig');
    }

}
