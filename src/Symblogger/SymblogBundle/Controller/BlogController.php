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
    public function showAction($id,$slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('SymbloggerSymblogBundle:Blog')->find($id);
        $comments = $em->getRepository('SymbloggerSymblogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('SymbloggerSymblogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments,
        ));
    }
}