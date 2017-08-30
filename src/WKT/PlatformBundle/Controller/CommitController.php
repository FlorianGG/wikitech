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
		$user = $this->getUser();

		$em = $this->getDoctrine()->getManager();
		$commits = $em->getRepository('WKTPlatformBundle:Commit')->findBy(array('isValidate' => null), array('id' => 'DESC'));

		// on crée un tableau contenant tous les users dont un commit est à valider
		// puis on calcul le confidence Score pour chacun
		$confidenceScores = [];
		foreach ($commits as $commit) {
			if (!is_null($commit->getUser()) && !array_key_exists($commit->getUser()->getUsername(), $confidenceScores)) {
				$confidenceScores[$commit->getUser()->getUsername()] = $this->container->get('wkt_user.confidence_score')->getConfidenceScore($commit->getUser());
			}
		}

		return $this->render('WKTPlatformBundle:Commit:index.html.twig', array(
			'commits' => $commits,
			'confidenceScores' => $confidenceScores));
	}


}
