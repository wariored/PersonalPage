<?php

namespace NK\PersoPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class AccueilController extends Controller
{
    public function accueilAction($value, Request $request)
    {
    	if($value != 'professor')
    	{
    		$em = $this->getDoctrine()
                	->getManager();
            $professorSearchedNotMe = $em->getRepository("AppBundle:User")
                                    	->findOneBy(array('username' => $value));
            return $this->render('NKPersoPageBundle:PagesPersonnelles:Accueil.html.twig', 
        		array('professorFoundNotMe' => $professorSearchedNotMe)
    		);
    	}
        return $this->render('NKPersoPageBundle:PagesPersonnelles:Accueil.html.twig', 
        	array('value' => $value)
    	);
    }
}
