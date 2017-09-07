<?php 
// src/WKT/CoreBundle/Controller/CoreController.php

namespace WKT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CoreController extends Controller
{
	public function homeAction()
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser();

		$trainings = $em->getRepository('WKTPlatformBundle:Training')->findBy(array('draft' => false));
		$userTrainings = $em->getRepository('WKTUserBundle:UserTraining')->findBy(array('user' => $user));
		$trainingsBeginned = $this->container->get('wkt_user.training_is_finished')->getTrainingsBeginnedStatus($userTrainings);

		//on récupère les 3 premiers users au leaderboard général
		$users = $em->getRepository('WKTUserBundle:User')->findBy(array('enabled' => true), array('nbPoint' => 'DESC'), 3, 0);

		// list de 6 formations aléatoires ou 6 formations aléatoires dans la liste de celles commencées
		$randTrainings = $this->randTraining($trainings);
		return $this->render('WKTCoreBundle:Core:home.html.twig', array(
			'trainings' => $randTrainings,
			'trainingsBeginned' => $trainingsBeginned,
			'users' => $users));
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
		if ($size >= 6) {
			$nb = 6;
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

	public function leaderboardAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$users = $em->getRepository('WKTUserBundle:User')->findBy(array('enabled' => true), array('nbPoint' => 'DESC'));

		return $this->render('WKTCoreBundle:Core:leaderboard.html.twig', array(
			'users' => $users,));

	}
}
