<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
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
                ->findAll();
            
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
    public function contactAction(Request $request)
    {       
         $contact = new Contact;
         $form = $this->createForm(ContactType::class, $contact);
         if($form->handleRequest($request)->isSubmitted()){
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($contact);
                 $em->flush();
                 return $this->redirectToRoute('app_homepage');
             }
         $form = $form->createView();
         return $this->render('@App/App/contact.html.twig', [
             "form" => $form
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
                ->findAll()->getProduits();
            
            return $this->render('@App/App/panier.html.twig', [
                'commandes' => $commandes,
                
            ]);
    }
}
