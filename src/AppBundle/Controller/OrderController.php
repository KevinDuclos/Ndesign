<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contact;
use App\Entity\Commande;
use AppBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Session\Session; 

class OrderController extends Controller
{
    public function panierAction($id)
    {
	
        $em = $this->getDoctrine()->getManager();
            $produit = $em
                ->getRepository('AppBundle:Produit')
                ->findBy(array(
					'id' => $id
				));
            
            return $this->render('@App/App/panier.html.twig', [
				'produit' => $produit,
            ]);
    }



}