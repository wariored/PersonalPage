<?php

namespace NK\PersoPageBundle\Controller\Liens_Hobbies;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LienController extends Controller
{
    public function lienAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Liens_Hobbies:lien.html.twig');
    }
}