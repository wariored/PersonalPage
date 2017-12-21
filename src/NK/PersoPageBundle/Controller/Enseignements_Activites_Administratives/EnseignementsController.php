<?php

namespace NK\PersoPageBundle\Controller\Enseignements_Activites_Administratives;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EnseignementsController extends Controller
{
    public function enseignementsAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:Enseignements.html.twig');
    }
}