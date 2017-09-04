<?php 
// src/WKT/PlatformBundle/Controller/TrainingController.php

namespace WKT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CoreController extends Controller
{
	public function homeAction()
	{
		$user = $this->getUser();

		if (is_null($user)) {
			$trainings = $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:Training')->findAll();
		}else{
			$trainings = $this->container->get('wkt_user.training_is_finished')->listOfTrainingsBeginned($user);
		}

		// list de 3 formations aléatoires ou 3 formations aléatoires dans la liste de celles commencées
		$randTrainings = $this->randTraining($trainings);
		return $this->render('WKTCoreBundle:Core:home.html.twig', array(
			'trainings' => $randTrainings,
			));
	}

	// factorisation fonction qui génère 3 trainings aléatoire
	private function randTraining($trainings)
	{
		$size = sizeof($trainings);
		if ($size === 0) {
			return null;
		}
		if ($size === 1) {
			return $trainings[0];
		}

		$nb = '';
		if ($size >= 3) {
			$nb = 3;
		}else{
			$nb = $size;
		}
		if (is_array($trainings)) {
			$arrayRandKey = array_rand($trainings, $nb);
		}else{
			$arrayRandKey = array_rand($trainings->toArray(), $nb);
		}
		

		$arrayRand = [];

		foreach ($arrayRandKey as $key) {
			$arrayRand[] = $trainings[$key];
		}

		return $arrayRand;
	}
}
