<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function testAction(){
        $em = $this->getDoctrine()->getManager();
        $commandes = $em
            ->getRepository('AppBundle:Commande')
            ->getAllCommandeJoinwithProduct();
        
        return $this->render('@App/App/test.html.twig', [
            'commandes' => $commandes,
            'user' => $this->getUser()
            
        ]);

    }
}