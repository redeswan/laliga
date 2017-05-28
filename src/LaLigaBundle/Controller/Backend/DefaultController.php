<?php

namespace LaLigaBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LaLigaBundle:Backend\\Default:index.html.twig');
    }
    
    
}
