<?php

namespace NK\PersoPageBundle\Controller\Liens_Hobbies;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HobbieController extends Controller
{
    public function hobbieAction()
    {
        return $this->render('NKPersoPageBundle:PagesPersonnelles/Liens_Hobbies:hobbie.html.twig');
    }
}
