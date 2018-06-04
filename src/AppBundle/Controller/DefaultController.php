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
    public function indexAction()
    {
        return $this->render('@App/Default/index.html.twig');
    }
    public function retrieveAction(){
        return $this->render('@App/Default/retrieve.html.twig');
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
    public function dashboardAction(){
        return $this->render('@App/Default/dashboard.html.twig');
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
        return $this->render('@App/Default/login.html.twig');
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
