<?php

namespace NK\PersoPageBundle\Controller\Recherche_Publications;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NK\PersoPageBundle\Entity\PublishedData;
use NK\PersoPageBundle\Entity\SavedData;
use NK\PersoPageBundle\Entity\Professor;

class RechercheController extends Controller
{
    public function rechercheAction($value, Request $request)
    {
    	$em = $this->getDoctrine()
                    ->getManager();
    	$user = $this->getUser();
    	if ($user) 
    	{
    		if($user->hasRole('ROLE_PROFESSOR') && $value == 'professor')
        	{
		    	if ('POST' === $request->getMethod())
		        {
		        	$em = $this->getDoctrine()
		                    ->getManager();
		        	if ($request->isXMLHttpRequest()) 
		        	{
			            $recherche = $request->request->get('request');
			            $professor = $user->getProfessor();
			            if ($professor->getSavedData()) 
			            {
			            	$savedData = $professor->getSavedData();
			            	$savedData->setrecherche($recherche);
			            	$em->persist($savedData);
			            }
			            else
			            {
			            	$savedData = new SavedData();
			            	$savedData->setRecherche($recherche);
			            	$savedData->setProfessor($professor);
			            	$em->persist($savedData);
			            }
		                $em->flush();
		        	}
		        	else
		        	{
			            $recherche = $request->get('recherche');
			            $professor = $user->getProfessor();
			            if ($professor->getPublishedData()) 
			            {
			            	$publishedData = $professor->getPublishedData();
			            	$publishedData->setRecherche($recherche);
			            	$em->persist($publishedData);
			            }
			            else
			            {
			            	$publishedData = new PublishedData();
			            	$publishedData->setRecherche($recherche);
			            	$publishedData->setProfessor($professor);
			            	$em->persist($publishedData);
			            }
		                $em->flush();
		                $this->get('session')->getFlashBag()->add('notice', 'Les modifications ont été bien enregistrées!');
		        	}
		        }
	    	}
	    	else if ($value != 'professor' && $value != $user->getUsername())
		    {
		    	$professorSearchedNotMe = $em->getRepository("AppBundle:User")
                                    		->findOneBy(array('username' => $value));
                return $this->render('NKPersoPageBundle:PagesPersonnelles/Recherche_Publications:Recherche.html.twig',
            		array('professorFoundNotMe' => $professorSearchedNotMe)
        		);
		    }
    	}
    	else
    	{
        	$professorSearched = $em->getRepository("AppBundle:User")
                                    ->findOneBy(array('username' => $value));
            return $this->render('NKPersoPageBundle:PagesPersonnelles/Recherche_Publications:Recherche.html.twig',
        		array('professorFound' => $professorSearched)
    		);
    	}	
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Recherche_Publications:Recherche.html.twig');
    }
}
