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
    public function singleAction($id){
        $em = $this->getDoctrine()->getManager();
        $produit = $em
            ->getRepository('AppBundle:Produit')
            ->find($id);
        
        return $this->render('@App/App/single.html.twig', [
            'produit' => $produit
        ]);
    }
    public function contactAction()
    {
        $em = $this->getDoctrine()->getManager();
            $commandes = $em
                ->getRepository('AppBundle:Commande')
                ->getAllCommandeJoinwithProduct();
            
            return $this->render('@App/App/contact.html.twig', [
                'commandes' => $commandes,
                'user' => $this->getUser()
                
            ]);
    }
    public function venteAction()
    {
        return $this->render('@App/App/vente.html.twig');
    }
    public function panierAction()
    {
        $em = $this->getDoctrine()->getManager();
            $commandes = $em
                ->getRepository('AppBundle:Commande')
                ->getAllCommandeJoinwithProduct();
            
            return $this->render('@App/App/panier.html.twig', [
                'commandes' => $commandes,
                
            ]);
    }
}
