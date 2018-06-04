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
            ->findAll();
        
        return $this->render('@App/Default/test.html.twig', [
            'commandes' => $commandes
        ]);

    }
}