<?php

namespace NK\PersoPageBundle\Controller\Enseignements_Activites_Administratives;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NK\PersoPageBundle\Entity\PublishedData;
use NK\PersoPageBundle\Entity\SavedData;
use NK\PersoPageBundle\Entity\Professor;

class ActivitesAdministrativesController extends Controller
{
    public function activitesAdministrativesAction($value, Request $request)
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
			            $activAdmin = $request->request->get('request');
			            $professor = $user->getProfessor();
			            if ($professor->getSavedData()) 
			            {
			            	$savedData = $professor->getSavedData();
			            	$savedData->setActivAdmin($activAdmin);
			            	$em->persist($savedData);
			            }
			            else
			            {
			            	$savedData = new SavedData();
			            	$savedData->setActivAdmin($activAdmin);
			            	$savedData->setProfessor($professor);
			            	$em->persist($savedData);
			            }
		                $em->flush();

		        	}
		        	else
		        	{
			            $activAdmin = $request->get('activAdmin');
			            $professor = $user->getProfessor();
			            if ($professor->getPublishedData()) 
			            {
			            	$publishedData = $professor->getPublishedData();
			            	$publishedData->setActivAdmin($activAdmin);
			            	$em->persist($publishedData);
			            }
			            else
			            {
			            	$publishedData = new PublishedData();
			            	$publishedData->setActivAdmin($activAdmin);
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
                return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:ActivitesAdministratives.html.twig',
            		array('professorFoundNotMe' => $professorSearchedNotMe)
        		);
		    }
    	}
    	else
    	{
        	$professorSearched = $em->getRepository("AppBundle:User")
                                    ->findOneBy(array('username' => $value));
            return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:ActivitesAdministratives.html.twig',
        		array('professorFound' => $professorSearched)
    		);
    	}
    	
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:ActivitesAdministratives.html.twig');
    }
}
