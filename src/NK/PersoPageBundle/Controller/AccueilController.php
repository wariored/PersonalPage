<?php

namespace NK\PersoPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function accueilAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles:Accueil.html.twig');
    }
}
