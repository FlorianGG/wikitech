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

	 	//on récupère le user courant
		$user = $this->getUser();

	   	$link = new Link();
	   	$link->setUser($user);

	    $form  = $this->get('form.factory')->create(LinkType::class, $link);

	    $form->handleRequest($request);
	 	
		if ($request->isXmlHttpRequest()) {

			$idSocial = $request->request->get('social');
			$social = $this->getDoctrine()->getManager()->getRepository('WKTUserBundle:Social')->find($idSocial);
			$link->setSocial($social)->setTitle($request->request->get('title'))->setUrl($request->request->get('url'));
			$em = $this->getDoctrine()->getManager();
			$em->persist($link);
			$em->flush();
			
			return new JsonResponse(array('id' => $link->getId(), 'social' => $link->getSocial()->getLogo(), 'title' => $link->getTitle(), 'url' => $link->getUrl()), 200);
		}
	    
	    return $this->render('WKTUserBundle:Link:add.html.twig', array(
	      'form' => $form->createView(),
	    ));
	}

	public function addAjaxAction(Request $request)
	{
	    if (!$request->isXmlHttpRequest()) {
	        return new JsonResponse(array('message' => 'Erreur : Ce n\'est pas une requête AJAX'), 400);
	    }
	 	//on récupère le user courant
		$user = $this->getUser();

	   	$link = new Link();
	   	$link->setUser($user);

	    $form  = $this->get('form.factory')->create(LinkType::class, $link);

	    $form->handleRequest($request);
	 
	    if ($form->isValid()) {
	        $em = $this->getDoctrine()->getManager();
	        $em->persist($link);
	        $em->flush();
	 		
	 		$request->getSession()->getFlashBag()->add('notice', 'Votre modification a été enregistrée');

	        return new JsonResponse(array('social' => $link->getSocial(), 'title' => $link->getTitle(), 'url' => $link->getUrl()), 200);
	    }
	 
	    return $this->render('WKTUserBundle:Link:add.html.twig', array(
	      'form' => $form->createView(),
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
