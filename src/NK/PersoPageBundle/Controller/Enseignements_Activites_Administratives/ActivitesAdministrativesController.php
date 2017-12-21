<?php

namespace NK\PersoPageBundle\Controller\Enseignements_Activites_Administratives;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActivitesAdministrativesController extends Controller
{
    public function activitesAdministrativesAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Enseignements_Activites_Administratives:ActivitesAdministratives.html.twig');
    }
}
