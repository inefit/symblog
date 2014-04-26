<?php
// src/Symblogger/SymblogBundle/Controller/BlogController.php

namespace Symblogger\SymblogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('SymbloggerSymblogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('SymbloggerSymblogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }
}