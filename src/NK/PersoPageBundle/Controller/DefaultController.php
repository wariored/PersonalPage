<?php

namespace NK\PersoPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NKPersoPageBundle:Default:index.html.twig');
    }
}
