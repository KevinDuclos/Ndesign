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
        return $this->render('@App/App/index.html.twig', [
            'user'=> $this->getUser()
        ]);
    }
    public function contactAction()
    {
        return $this->render('@App/App/contact.html.twig');
    }

    public function venteAction()
    {
        return $this->render('@App/App/vente.html.twig');
    }
    public function singleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $template = $em
            ->getRepository('AppBundle:Produit')
            ->find($id);
        
        return $this->render('@App/App/single.html.twig', [
            'template' => $template
        ]);
    }
}
