<?php

namespace NK\PersoPageBundle\Controller\Enseignements_Activites_Administratives;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NK\PersoPageBundle\Entity\PublishedData;
use NK\PersoPageBundle\Entity\SavedData;
use NK\PersoPageBundle\Entity\Professor;

class EnseignementsController extends Controller
{
    public function enseignementsAction($value, Request $request)
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
			            $enseignement = $request->request->get('request');
			            $professor = $user->getProfessor();
			            if ($professor->getSavedData()) 
			            {
			            	$savedData = $professor->getSavedData();
			            	$savedData->setEnseignement($enseignement);
			            	$em->persist($savedData);
			            }
			            else
			            {
			            	$savedData = new SavedData();
			            	$savedData->setEnseignement($enseignement);
			            	$savedData->setProfessor($professor);
			            	$em->persist($savedData);
			            }
		                $em->flush();
		        	}
		        	else
		        	{
			            $enseignement = $request->get('enseignement');
			            $professor = $user->getProfessor();
			            if ($professor->getPublishedData()) 
			            {
			            	$publishedData = $professor->getPublishedData();
			            	$publishedData->setEnseignement($enseignement);
			            	$em->persist($publishedData);
			            }
			            else
			            {
			            	$publishedData = new PublishedData();
			            	$publishedData->setEnseignement($enseignement);
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
                return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:Enseignements.html.twig',
            		array('professorFoundNotMe' => $professorSearchedNotMe)
        		);
		    }
    	}
    	else
    	{
        	$professorSearched = $em->getRepository("AppBundle:User")
                                    ->findOneBy(array('username' => $value));
            return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:Enseignements.html.twig',
        		array('professorFound' => $professorSearched)
    		);
    	}
    	
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:Enseignements.html.twig');
    }
}