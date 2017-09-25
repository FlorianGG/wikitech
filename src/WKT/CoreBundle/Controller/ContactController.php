<?php 
// src/WKT/CoreBundle/Controller/ContactController.php

namespace WKT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\CoreBundle\Entity\Contact;
use WKT\CoreBundle\Form\Type\ContactType;




class ContactController extends Controller
{
	public function sendEmailAction(Request $request)
	{
		$contact = new Contact();

		if ($this->getUser()) {
			$name = $this->getUser()->getFirstname() . ' ' . $this->getUser()->getLastname();
			$contact->setName($name)->setEmail($this->getUser()->getEmail());
		}

		$form  = $this->get('form.factory')->create(ContactType::class, $contact);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$message = \Swift_Message::newInstance()
			    ->setSubject($contact->getSubject())
			    ->setFrom($contact->getEmail())
			    ->setTo('no-reply@florian-garcia.com')
			    ->setContentType('text/html')
			    ->setBody($this->renderView('Emails/contact.html.twig', array(
			    	'contact' => $contact)));
			 
			if (! $this->get('mailer')->send($message)) {
			    // Il y a eu un problème donc on traite l'erreur
			    throw new \Exception('Le mail n\'a pas pu être envoyé');
			}

			$request->getSession()->getFlashBag()->add('notice', 'Email bien envoyé 👍 !');

			return $this->redirectToRoute('wkt_core_home');

		}
		
		return $this->render('WKTCoreBundle:Contact:contact.html.twig', array(
			'form' => $form->createView()));

	}
}
