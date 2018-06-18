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
    public function add_panierAction($id, Session $session)
    {
        
        

        $em = $this->getDoctrine()->getManager();
            $produit = $em
                ->getRepository('AppBundle:Produit')
                ->findBy(array(
					'id' => $id
                ));

                if (!$session->has('produit')) $session->set('produit', array());
                $produit = $session->get('produit');

                if (array_key_exists($id, $produit)) {

                    # Oeuvre présente -> retour à la selection
                    return $this->redirectToRoute('app_all');
        
                }else{
        
                    # Ajout de l'oeuvre dans le panier Session
                    $produit[$id] = $id;
                    $session->set('produit',$produit);

                    return $this->redirectToRoute('app_all');
                    
                    
                }
            

    }

    public function panierAction(Session $session)
    {
        # On ouvre une session (si besoin)
		if(!isset($session)) {$session = new Session();}

		# Récupération des paniers en session
		$spanierVente    = $session->get('produit');
        $commandes=[];
		# Réuperation des oeuvres en bdd
		if (!empty($spanierVente)){

			$idsv = array_keys($spanierVente);
			foreach ($idsv as $id){
				$commandes[$id] = $this->getDoctrine()->getRepository('AppBundle:Produit')->find($id);
			}
		}

		return $this->render('@App/App/panier.html.twig',[
            'commandes' => $commandes,
            'spanierVente' => $spanierVente
        ]);

    }

    public function delete($id, Session $session) {

		# Vérification de la présence de l'oeuvre dans le panier
		$panierVente = $session->get( 'produit' );
		if ( array_key_exists( $id, $panierVente ) ) {

			# Si présence  suppression la clé
			unset($panierVente[$id]);
			$session->set('produit', $panierVente);
			return $this->redirectToRoute('app_all');
		} else {

			# Sinon redirection a la sélection
			return $this->redirectToRoute('app_all');
		}

	}



}