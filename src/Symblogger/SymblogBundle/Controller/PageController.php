<?php
// src/Symblogger/BlogBundle/Controller/PageController.php

namespace Symblogger\SymblogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symblogger\SymblogBundle\Entity\Enquiry;
use Symblogger\SymblogBundle\Form\EnquiryType;

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
        $enquiry = new Enquiry();
	    $form = $this->createForm(new EnquiryType(), $enquiry);

	    $request = $this->getRequest();
	    if ($request->getMethod() == 'POST') {
	        $form->bind($request);

	        if ($form->isValid()) {
	        	$message = \Swift_Message::newInstance()
	            	->setSubject('Contact enquiry from symblog')
	            	->setFrom('fahri.arrasyid@gmail.com')
	            	->setTo('fahri.arrasyid@gmail.com')
	            	->setBody($this->renderView('SymbloggerSymblogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
	        	$this->get('mailer')->send($message);

	        	$this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
	            // Perform some action, such as sending an email

	            // Redirect - This is important to prevent users re-posting
	            // the form if they refresh the page
	            return $this->redirect($this->generateUrl('_contact'));
	        }
	    }

	    return $this->render('SymbloggerSymblogBundle:Page:contact.html.twig', array(
	        'form' => $form->createView()
	    ));
    }
}