<?php 
// src/WKT/PlatformBundle/Controller/CommitController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Commit;


class CommitController extends Controller
{
	public function indexAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$commits = $em->getRepository('WKTPlatformBundle:Commit')->findAll();

		return $this->render('WKTPlatformBundle:Commit:index.html.twig', array('commits' => $commits));
	}


}
