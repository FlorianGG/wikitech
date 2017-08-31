<?php 
// src/WKT/UserBundle/Controller/LinkController.php

namespace WKT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\UserBundle\Entity\Link;
use WKT\UserBundle\Form\Type\LinkType;
use WKT\UserBundle\Repository\LinkRepository;


class LinkController extends Controller
{
	public function addAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		
		//on récupère le user courant
		$user = $this->getUser();

		$link = new Link();
		$link->setUser($user);

		$links = $em->getRepository('WKTUserBundle:Link')->findBy(array('user' => $user));

		$form  = $this->get('form.factory')->create(LinkType::class, $link);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em->persist($link);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Votre modification a été enregistrée');

			return $this->redirectToRoute('fos_user_profile_edit');
		}

		return $this->render('WKTUserBundle:Link:add.html.twig', array(
		  'form' => $form->createView(),
		  'links' => $links,
		));
	}

	public function deleteAction(Request $request, Link $id)
	{
		$em = $this->getDoctrine()->getManager();

		if ($request->isXMLHttpRequest()) {
			$link = $em->getRepository('WKTUserBundle:Link')->find($id);
			$em->remove($link);
			$em->flush();
			return new JsonResponse('Lien supprimé');
		}

		return new Response('Erreur : Ce n\'est pas une requête AJAX', 400);

	}

	public function indexByUserAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		//on récupère le user courant
		$user = $this->getUser();

		//on récupère l'ensemble des liens du user
		$links = $em->getRepository('WKTUserBundle:Link')->findBy(array('user' => $user));

		return $this->render('WKTUserBundle:Link:indexByUser.html.twig', array(
		  'links' => $links,
		));



	}


}
