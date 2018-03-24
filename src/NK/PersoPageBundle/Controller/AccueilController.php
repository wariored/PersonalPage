<?php

namespace NK\PersoPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class AccueilController extends Controller
{
    public function accueilAction($value, Request $request)
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
                        $fieldToChange = $request->request->get('request');

                        $professor = $user->getProfessor();
                        if ($professor->getSavedData()) 
                        {
                            if ($request->request->get('query') == 'bref')
                            {
                                $savedData = $professor->getSavedData();
                                $savedData->setBref($fieldToChange);
                                $em->persist($savedData);
                            }
                            else if ($request->request->get('query') == 'biographie')
                            {
                                $savedData = $professor->getSavedData();
                                $savedData->setBiographie($fieldToChange);
                                $em->persist($savedData);
                            }
                            
                        }
                        else
                        {
                            if ($request->request->get('query') == 'bref') 
                            {
                                $savedData = new SavedData();
                                $savedData->setBref($recherche);
                                $savedData->setProfessor($professor);
                                $em->persist($savedData);
                            }
                            else if ($request->request->get('query') == 'biographie') 
                            {
                                $savedData = new SavedData();
                                $savedData->setBiographie($fieldToChange);
                                $savedData->setProfessor($professor);
                                $em->persist($savedData);
                            }

                            
                        }
                        $em->flush();
                    }
                    else
                    {
                        $professor = $user->getProfessor();
                        $bref = $request->get('bref');
                        $biographie = $request->get('biographie');
                        if ($professor->getPublishedData()) 
                        {
                            if ($request->request->has('bref'))
                            {
                                $publishedData = $professor->getPublishedData();
                                $publishedData->setBref($bref);
                                $em->persist($publishedData);
                                $em->flush();
                                $this->get('session')->getFlashBag()->add('notice', 'Les modifications ont été bien enregistrées!');
                            }
                            else if ($request->request->has('biographie'))
                            {
                                $publishedData = $professor->getPublishedData();
                                $publishedData->setBiographie($biographie);
                                $em->persist($publishedData);
                                $em->flush();
                                $this->get('session')->getFlashBag()->add('notice', 'Les modifications ont été bien enregistrées!');
                            }
                        }
                        else
                        {
                            if ($bref) 
                            {
                                $publishedData = new PublishedData();
                                $publishedData->setBref($bref);
                                $publishedData->setProfessor($professor);
                                $em->persist($publishedData);
                                $em->flush();
                                $this->get('session')->getFlashBag()->add('notice', 'Les modifications ont été bien enregistrées!');
                            }
                            else if ($biographie)
                            {
                                $publishedData = new PublishedData();
                                $publishedData->setBiographie($biographie);
                                $publishedData->setProfessor($professor);
                                $em->persist($publishedData);
                                $em->flush();
                                $this->get('session')->getFlashBag()->add('notice', 'Les modifications ont été bien enregistrées!');
                            }
                            
                        }
                    }
                }
            }
            else if ($value != 'professor' && $value != $user->getUsername())
            {
                $professorSearchedNotMe = $em->getRepository("AppBundle:User")
                                            ->findOneBy(array('username' => $value));
                return $this->render('NKPersoPageBundle:PagesPersonnelles:Accueil.html.twig',
                    array('professorFoundNotMe' => $professorSearchedNotMe)
                );
            }
        }
        else
        {
            $professorSearched = $em->getRepository("AppBundle:User")
                                    ->findOneBy(array('username' => $value));
            return $this->render('NKPersoPageBundle:PagesPersonnelles:Accueil.html.twig',
                array('professorFound' => $professorSearched)
            );
        }
        return $this->render('NKPersoPageBundle:PagesPersonnelles:Accueil.html.twig'
    	);
    }
}
