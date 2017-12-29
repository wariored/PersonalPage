<?php

namespace NK\PersoPageBundle\Controller\Recherche_Publications;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NK\PersoPageBundle\Entity\PublishedData;
use NK\PersoPageBundle\Entity\SavedData;
use NK\PersoPageBundle\Entity\Professor;

class PublicationController extends Controller
{
    public function publicationAction(Request $request)
    {
    	$user = $this->getUser();
    	if($user->hasRole('ROLE_PROFESSOR'))
        {
	    	if ('POST' === $request->getMethod())
	        {
	        	$em = $this->getDoctrine()
	                    ->getManager();
	        	if ($request->isXMLHttpRequest()) 
	        	{
		            $publication = $request->request->get('request');
		            $professor = $user->getProfessor();
		            if ($professor->getSavedData()) 
		            {
		            	$savedData = $professor->getSavedData();
		            	$savedData->setPublication($publication);
		            	$em->persist($savedData);
		            }
		            else
		            {
		            	$savedData = new SavedData();
		            	$savedData->setPublication($publication);
		            	$savedData->setProfessor($professor);
		            	$em->persist($savedData);
		            }
	                $em->flush();

	        	}
	        	else
	        	{
		            $publication = $request->get('publication');
		            $professor = $user->getProfessor();
		            if ($professor->getPublishedData()) 
		            {
		            	$publishedData = $professor->getPublishedData();
		            	$publishedData->setPublication($publication);
		            	$em->persist($publishedData);
		            }
		            else
		            {
		            	$publishedData = new PublishedData();
		            	$publishedData->setPublication($publication);
		            	$publishedData->setProfessor($professor);
		            	$em->persist($publishedData);
		            }
	                $em->flush();
	                $this->get('session')->getFlashBag()->add('notice', 'Les modifications ont été bien enregistrées!');

	        	}
	        	

	        }
	    }
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Recherche_Publications:publication.html.twig');
    }
}
