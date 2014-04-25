<?php

namespace Symblogger\SymblogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SymbloggerSymblogBundle:Default:index.html.twig', array('name' => $name));
    }
}
