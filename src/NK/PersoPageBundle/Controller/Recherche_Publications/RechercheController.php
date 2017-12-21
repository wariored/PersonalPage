<?php

namespace NK\PersoPageBundle\Controller\Recherche_Publications;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RechercheController extends Controller
{
    public function rechercheAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Recherche_Publications:Recherche.html.twig');
    }
}
