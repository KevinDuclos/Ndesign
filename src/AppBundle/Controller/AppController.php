<?php

namespace AppBundle\Controller;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
    
            $em = $this->getDoctrine()->getManager();
            $produits = $em
                ->getRepository('AppBundle:Produit')
                ->findAll();
            
            return $this->render('@App/App/index.html.twig', [
                'produits' => $produits,
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
         $form = $this->createForm(ContactType::class, $contact,array('method' => 'POST'));
        
         
        //  if($form->handleRequest($request)->isSubmitted()){
        //         $em = $this->getDoctrine()->getManager();
        //         $em->persist($contact);
        //         $em->flush();
        //     //    return $this->redirectToRoute('app_homepage');
            
        //  }
         $form = $form->createView();
         
         return $this ->render('@App/App/contact.html.twig', [
             'form'=> $form,
         ]);
         
    }
    
    public function contactFormAction(Request $request)
    {   

        $errors =[];
        // $status="unsaved";
        if($request->isXmlHttpRequest()){
       
            $contact = new Contact;
            $form = $this->createForm(ContactType::class, $contact,array('method' => 'POST'));
            $selected_documents = $request->request->get('data');
            $form ->handleRequest($request);
            // if($form->isValid()){ 
                // die('bonjour');
                
                $contact->setEmail($selected_documents[0]['value']);
                $contact->setTelephone($selected_documents[1]['value']);
                $contact->setSujet($selected_documents[2]['value']);
                $contact->setMessage($selected_documents[3]['value']);

                $status = "saved";                
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
            }
            $response = new JsonResponse(array('status' => 'saved', 'data'=> $selected_documents));
            return $response;
            
        // }

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
                ->findAll();
            
            return $this->render('@App/App/panier.html.twig', [
                'commandes' => $commandes
            ]);
    }
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();
            $produits = $em
                ->getRepository('AppBundle:Produit')
                ->findAll();
            
            return $this->render('@App/App/all.html.twig', [
                'produits' => $produits,
            ]);
    }
    
    public function confidentAction()
    {
        return $this->render('@App/App/confident.html.twig');
    }
}
