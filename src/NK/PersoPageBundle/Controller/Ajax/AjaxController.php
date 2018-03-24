<?php

namespace NK\PersoPageBundle\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use NK\PersoPageBundle\Entity\SavedData;

class AjaxController extends Controller
{
    public function ajaxAction($field, Request $request)
    {
        $user = $this->getUser();
    	if($user->hasRole('ROLE_PROFESSOR'))
        {
        	if ('POST' === $request->getMethod() && $request->isXMLHttpRequest() === true && $user->getProfessor()->getSavedData() != null)
	        {
	            switch ($field) {
	            	case 'publication':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getPublication());
	            		break;
	            	case 'enseignement':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getEnseignement());
	            		break;
	            	case 'activAdmin':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getActivAdmin());
	            		break;
	            	case 'lien':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getLien());
	            		break;
	            	case 'recherche':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getRecherche());
	            		break;
	            	case 'hobbie':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getHobbie());
	            		break;
	            	case 'bref':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getBref());
	            		break;
	            	case 'biographie':
	            		return new JsonResponse($user->getProfessor()->getSavedData()->getBiographie());
	            		break;
	            	default:
	            		# code...
	            		break;
	            }


	        }
	        return new JsonResponse('pas de resultats trouvé', Response::HTTP_NOT_FOUND);
        }
        throw  $this->createNotFoundException('Cette page n\'existe pas.');
    }
}