<?php

namespace NK\PersoPageBundle\Controller\Liens_Hobbies;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NK\PersoPageBundle\Entity\PublishedData;
use NK\PersoPageBundle\Entity\SavedData;
use NK\PersoPageBundle\Entity\Professor;

class LienController extends Controller
{
    public function lienAction($value, Request $request)
    {
    	$em = $this->getDoctrine()
                    ->getManager();
    	$user = $this->getUser();
    	if ($user) 
    	{
    		if($user->hasRole('ROLE_PROFESSOR')  && $value == 'professor')
        	{
		    	if ('POST' === $request->getMethod())
		        {
		        	$em = $this->getDoctrine()
		                    ->getManager();
		        	if ($request->isXMLHttpRequest()) 
		        	{
			            $lien = $request->request->get('request');
			            $professor = $user->getProfessor();
			            if ($professor->getSavedData()) 
			            {
			            	$savedData = $professor->getSavedData();
			            	$savedData->setLien($lien);
			            	$em->persist($savedData);
			            }
			            else
			            {
			            	$savedData = new SavedData();
			            	$savedData->setLien($lien);
			            	$savedData->setProfessor($professor);
			            	$em->persist($savedData);
			            }
		                $em->flush();

		        	}
		        	else
		        	{
			            $lien = $request->get('lien');
			            $professor = $user->getProfessor();
			            if ($professor->getPublishedData()) 
			            {
			            	$publishedData = $professor->getPublishedData();
			            	$publishedData->setLien($lien);
			            	$em->persist($publishedData);
			            }
			            else
			            {
			            	$publishedData = new PublishedData();
			            	$publishedData->setLien($lien);
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
                return $this->render('NKPersoPageBundle:PagesPersonnelles/Liens_Hobbies:lien.html.twig',
            		array('professorFoundNotMe' => $professorSearchedNotMe)
        		);
		    }
    	}
    	else 
    	{
        	$professorSearched = $em->getRepository("AppBundle:User")
                                    ->findOneBy(array('username' => $value));
            return $this->render('NKPersoPageBundle:PagesPersonnelles/Liens_Hobbies:lien.html.twig', 
        		array('professorFound' => $professorSearched)
    		);
    	}
    	
    	
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Liens_Hobbies:lien.html.twig');
    }
}