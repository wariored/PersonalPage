<?php

namespace NK\PersoPageBundle\Controller\Recherche_Publications;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicationController extends Controller
{
    public function publicationAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Recherche_Publications:publication.html.twig');
    }
}
