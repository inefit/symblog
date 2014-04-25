<?php
// src/Symblogger/BlogBundle/Controller/PageController.php

namespace Symblogger\SymblogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('SymbloggerSymblogBundle:Page:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('SymbloggerSymblogBundle:Page:about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('SymbloggerSymblogBundle:Page:contact.html.twig');
    }
}