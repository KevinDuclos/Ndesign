<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    public function retrieveAction(){
        return $this->render('@App/Default/single.html.twig');
    }
    public function createAction(){
        return $this->render('@App/Default/create.html.twig');
    }
    public function updateAction(){
        return $this->render('@App/Default/update.html.twig');
    }
    public function deleteAction(){
        return $this->render('@App/Default/delete.html.twig');
    }
}
